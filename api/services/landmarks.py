import asyncio
import cv2
import mediapipe as mp
from matplotlib import pyplot as plt

mp_holistic = mp.solutions.holistic
mp_drawing = mp.solutions.drawing_utils
stream_flag = True 

def mediapipe_detection(image, model):
    image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB) # Color conversion BGR to RGB
    image.flags.writeable = False                   # Image is no longer writeable
    results = model.process(image)                  # Make prediction
    image.flags.writeable = True                    # Image is now writeable 
    image = cv2.cvtColor(image, cv2.COLOR_RGB2BGR) # Color conversion RGB to BGR
    return image, results

def draw_landmarks(image, results):
    
    mp_drawing.draw_landmarks(image, results.face_landmarks, mp_holistic.FACEMESH_CONTOURS, 
        mp_drawing.DrawingSpec(color=(80,110,10), thickness=1, circle_radius=1), 
        mp_drawing.DrawingSpec(color=(80,256,121), thickness=1, circle_radius=1)
    ) 
    mp_drawing.draw_landmarks(image, results.pose_landmarks, mp_holistic.POSE_CONNECTIONS,
        mp_drawing.DrawingSpec(color=(80,22,10), thickness=2, circle_radius=4), 
        mp_drawing.DrawingSpec(color=(80,44,121), thickness=2, circle_radius=2)
    )
    mp_drawing.draw_landmarks(image, results.left_hand_landmarks, mp_holistic.HAND_CONNECTIONS,
        mp_drawing.DrawingSpec(color=(121,22,76), thickness=2, circle_radius=4), 
        mp_drawing.DrawingSpec(color=(121,44,250), thickness=2, circle_radius=2)
    ) 
    mp_drawing.draw_landmarks(image, results.right_hand_landmarks, mp_holistic.HAND_CONNECTIONS,
        mp_drawing.DrawingSpec(color=(245,117,66), thickness=2, circle_radius=4),
        mp_drawing.DrawingSpec(color=(245,66,230), thickness=2, circle_radius=2)
    ) 


async def generate_frames():
    cap = cv2.VideoCapture(0)
    with mp_holistic.Holistic(min_detection_confidence=0.5, min_tracking_confidence=0.5) as holistic:
        global stream_flag 
        print("stream_flag: ", stream_flag)
        while True:
            ret, frame = cap.read()
            if not ret:
                break
            
            # Make detections
            image, results = mediapipe_detection(frame, holistic)

            # Draw landmarks
            draw_landmarks(image, results)

            plt.imshow(cv2.cvtColor(image, cv2.COLOR_BGR2RGB))

            _, buffer = cv2.imencode('.jpg', image)
            frame_bytes = buffer.tobytes()

            yield (b'--frame\r\n'
                b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n\r\n')
            
            if stream_flag == False:
                break

            await asyncio.sleep(0.1)
        cap.release()
        cv2.destroyAllWindows()

def stop_feed():
    global stream_flag
    stream_flag = False
    cv2.destroyAllWindows()