import numpy as np
import mediapipe as mp
from tensorflow.keras.models import load_model


model = load_model("models/model.h5")

labels = []
with open("models/labels.txt", "r") as file:
    for line in file:
        folder_name = line.strip()
        labels.append(folder_name)
actions = np.array(labels)

def predict(data: list[list[float]]):
    res = model.predict(np.expand_dims(data, axis=0))[0]
    print(actions[np.argmax(res)])
    return {"action": actions[np.argmax(res)]}