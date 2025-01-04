pub mod api_helper {
    use rocket::serde::json::Json;

    pub async fn get_data(url: &str) -> Json<serde_json::Value> {
        let res = reqwest::get(url).await.unwrap().text().await;
        Json(serde_json::from_str(&res.unwrap()).unwrap())
    }
}
