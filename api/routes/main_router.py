from fastapi import APIRouter, HTTPException
from models.landmarks import LandmarksData
import numpy as np

router = APIRouter()

@router.post("/process_string")
async def process_landmarks(data: LandmarksData):
    try:
        hand1_landmark = data.hand1
        hand2_landmark = data.hand2
        pose_landmark = data.pose
        face_landmark = data.face


        print(f"Received Hand1 Landmark: {len(hand1_landmark)}")
        print(f"Received Hand1 Landmark: {len(hand2_landmark)}")
        print(f"Received Pose Landmark: {len(pose_landmark)}")
        print(f"Received Face Landmark: {len(face_landmark)}")

        # np.concatenate

        return {"message": "Landmarks processed successfully"}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))


