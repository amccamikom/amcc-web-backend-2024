use rocket::fairing::{Fairing, Info, Kind};
use rocket::http::Header;
use rocket::{get, routes, serde::json::Json};
use rocket::{Request, Response};

pub struct CORS;

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
fn index() -> Json<serde_json::Value> {
    Json(serde_json::json!({
        "message": "Hello, Backend Dev !!"
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

#[shuttle_runtime::main]
async fn main() -> shuttle_rocket::ShuttleRocket {
    let rocket = rocket::build()
        .mount("/api", routes![index])
        .mount("/", routes![catch_all])
        .attach(CORS);

    Ok(rocket.into())
}
