from fastapi import APIRouter
from fastapi.responses import StreamingResponse

from services.landmarks import generate_frames, stop_feed

router = APIRouter()

@router.get("/")
async def root():
    return {"message": "Hello World"}

@router.get("/video_feed")
async def video_feed():
    return StreamingResponse(generate_frames(), media_type="multipart/x-mixed-replace;boundary=frame")

@router.post("/stop_video_feed")
async def stop_video_feed():
    return stop_feed();

