from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from routes.main_router import router as main_router

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=[
        "https://signa-lingua.test", 
        "http://127.0.0.1:8000",
        "https://127.0.0.1:5173"
        ], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

app.include_router(main_router)

