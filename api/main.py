from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware
from routes.main_router import router as main_router

app = FastAPI()

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], 
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

app.include_router(main_router)

