from typing import List, Optional
from pydantic import BaseModel

class Landmark(BaseModel):
    x: float
    y: float
    z: float

class LandmarksData(BaseModel):
    hand1: Optional[List[Landmark]]
    hand2: Optional[List[Landmark]]
    pose: Optional[List[Landmark]]
    face: Optional[List[Landmark]]