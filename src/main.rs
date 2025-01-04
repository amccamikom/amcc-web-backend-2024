use chrono::Utc;
use rocket::fairing::{Fairing, Info, Kind};
use rocket::http::Header;
use rocket::{get, routes, serde::json::Json};
use rocket::{Request, Response};
use std::net::SocketAddr;
use std::time::Instant;

pub struct CORS;
mod helpers;

#[rocket::async_trait]
impl Fairing for CORS {
    fn info(&self) -> Info {
        Info {
            name: "Add CORS headers to responses",
            kind: Kind::Response,
        }
    }

    async fn on_response<'r>(&self, _request: &'r Request<'_>, response: &mut Response<'r>) {
        response.set_header(Header::new("Access-Control-Allow-Origin", "*"));
        response.set_header(Header::new(
            "Access-Control-Allow-Methods",
            "POST, GET, PATCH, OPTIONS",
        ));
        response.set_header(Header::new("Access-Control-Allow-Headers", "*"));
        response.set_header(Header::new("Access-Control-Allow-Credentials", "true"));
    }
}

#[get("/")]
fn index(client_ip: SocketAddr) -> Json<serde_json::Value> {
    let start_time = Instant::now();

    let timestamp = Utc::now().to_rfc3339();

    let execution_time = start_time.elapsed().as_millis();

    let hero_headline = "Turning Code into Web Apps";
    let hero_subline = "From messy commits to polished products, we create the web";

    Json(serde_json::json!({
        "headline": hero_headline,
        "subline": hero_subline,
        "timestamp": timestamp,
        "execution_time": execution_time,
        "your_ip": client_ip,
    }))
}

use rocket::fs::NamedFile;
use std::path::PathBuf;

#[get("/<path..>")]
async fn catch_all(path: PathBuf) -> Option<NamedFile> {
    if path.to_str().unwrap_or_default().starts_with("assets") {
        NamedFile::open(format!("frontend/dist/{}", path.display()))
            .await
            .ok()
    } else {
        NamedFile::open("frontend/dist/index.html").await.ok()
    }
}

#[get("/top")]
async fn anime_top() -> Json<serde_json::Value> {
    let url = "https://api.jikan.moe/v4/top/anime";

    return helpers::api_helper::get_data(url).await;
}

#[get("/upcoming")]
async fn anime_upcoming() -> Json<serde_json::Value> {
    let url: &str = "https://api.jikan.moe/v4/seasons/upcoming";

    return helpers::api_helper::get_data(url).await;
}

#[shuttle_runtime::main]
async fn main() -> shuttle_rocket::ShuttleRocket {
    let rocket = rocket::build()
        .mount("/api", routes![index])
        .mount("/", routes![catch_all])
        .mount("/anime", routes![anime_top, anime_upcoming])
        .attach(CORS);

    Ok(rocket.into())
}
