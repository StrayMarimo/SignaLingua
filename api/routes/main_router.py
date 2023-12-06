from fastapi import APIRouter
from services.predict import predict
import numpy as np

router = APIRouter()

@router.post("/process_sequences")
async def process_sequences(sequences: list[list[float]]):
    return predict(sequences)


