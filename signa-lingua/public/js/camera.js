import {
    createGestureRecognizer,
    faceLandmarker,
    handLandmarker,
    poseLandmarker,
} from "./gestureRecognizer.js";

import { drawFaceLandmarks, drawHandLandmarks, drawPoseLandmarks, processLandmarks } from "./landmarks.js";

createGestureRecognizer();

let enableWebcamButton;
let webcamRunning = false;
let sequences = [];
const video = document.getElementById("webcam");
const canvasElement = document.getElementById("output_canvas");
const canvasCtx = canvasElement.getContext("2d");


// Check if webcam access is supported.
function hasGetUserMedia() {
    return !!(navigator.mediaDevices && navigator.mediaDevices.getUserMedia);
}

if (hasGetUserMedia()) {
    enableWebcamButton = document.getElementById("webcamButton");
    enableWebcamButton.addEventListener("click", enableCam);
} else {
    console.warn("getUserMedia() is not supported by your browser");
}
// Enable the live webcam view and start detection.
function enableCam(event) {
    // getUsermedia parameters.
    const constraints = {
        video: true,
    };
    if (!handLandmarker || !poseLandmarker || !faceLandmarker) {
        alert("Please wait for gestureRecognizer to load");
        return;
    }
    if (webcamRunning === true) {
        webcamRunning = false;
        enableWebcamButton.innerText = "Open camera";
    } else {
        webcamRunning = true;
        enableWebcamButton.innerText = "Close camera";
    }

    // Activate the webcam stream.
    navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
        video.srcObject = stream;
        if (webcamRunning === true)
            video.addEventListener("loadeddata", predictWebcam);
        else {
            console.log("Stopping camera");
            stream.getTracks().forEach(function (track) {
                track.stop();
            });
        }
    });
}

const getLandmarksOrNull = (array) => array && array.length > 0 ? array[0] : [];
let lastVideoTime = -1;
let results_hand = undefined;
let results_pose = undefined;
let results_face = undefined;

async function predictWebcam() {
    // const webcamElement = document.getElementById("webcam");
    let nowInMs = Date.now();
    if (video.currentTime !== lastVideoTime) {
        lastVideoTime = video.currentTime;
        results_hand = handLandmarker.detectForVideo(video, nowInMs);
        results_pose = poseLandmarker.detectForVideo(video, nowInMs);
        results_face = faceLandmarker.detectForVideo(video, nowInMs);
    }
    canvasCtx.save();
    canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
    if (results_hand.landmarks) {
        drawHandLandmarks(results_hand);
    }
    if (results_pose.landmarks) {
        drawPoseLandmarks(results_pose);
    }

    if (results_face.faceLandmarks) {
        drawFaceLandmarks(results_face);
    }

    sequences.push( await processLandmarks(results_hand, results_pose, results_face));
    if (sequences.length == 30) {
        try {
            const response = await fetch(
                "http://0.0.0.0:8001/process_sequences",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(sequences),
                }
            );

            if (response.ok) {
                const data = await response.json();

                const action = document.getElementById("action");
                action.innerText = data.action;
            } else {
                console.error("Error:", response.status, response.statusText);
            }
            
            // remove first element
            sequences.shift();
        } catch (error) {
            console.error("Fetch error:", error);
        }
    }

    await new Promise((resolve) => setTimeout(resolve, 100)); // S

    canvasCtx.restore();
    // keep predicting when webcam is running.
    if (webcamRunning === true) {
        window.requestAnimationFrame(predictWebcam);
    } else {
        canvasCtx.restore();
        canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
    }
}
