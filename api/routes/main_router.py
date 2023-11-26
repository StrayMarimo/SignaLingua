from fastapi import APIRouter, HTTPException
from models.landmarks import LandmarksData

router = APIRouter()

@router.post("/process_string")
async def process_landmarks(data: LandmarksData):
    try:
        hand_landmark = data.hand
        pose_landmark = data.pose
        face_landmark = data.face

        print(f"Received Hand Landmark: {len(hand_landmark)}")
        print(f"Received Pose Landmark: {len(pose_landmark)}")
        print(f"Received Face Landmark: {len(face_landmark)}")

        return {"message": "Landmarks processed successfully"}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


