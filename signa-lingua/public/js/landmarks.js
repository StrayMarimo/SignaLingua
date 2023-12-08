import {
    HandLandmarker,
    FaceLandmarker,
    DrawingUtils,
} from "https://cdn.jsdelivr.net/npm/@mediapipe/tasks-vision@0.10.3";

import { PoseLandmarker } from "https://cdn.skypack.dev/@mediapipe/tasks-vision@0.10.0";

const canvasElement = document.getElementById("output_canvas");
const canvasCtx = canvasElement.getContext("2d");
const videoHeight = "240px";
const videoWidth = "303px";

canvasCtx.save();
canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
const webcamElement = document.getElementById("webcam");
const drawingUtils = new DrawingUtils(canvasCtx);
canvasElement.style.height = videoHeight;
webcamElement.style.height = videoHeight;
canvasElement.style.width = videoWidth;
webcamElement.style.width = videoWidth;


export const drawFaceLandmarks = (results_face) => {
    for (const landmarks of results_face.faceLandmarks) {
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_TESSELATION,
            {
                color: "#C0C0C070",
                lineWidth: 1,
                radius: 2,
            }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_RIGHT_EYE,
            {
                color: "#FF3030",
                lineWidth: 1,
                radius: 2,
            }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_RIGHT_EYEBROW,
            {
                color: "#FF3030",
                lineWidth: 1,
                radius: 2,
            }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_LEFT_EYE,
            {
                color: "#30FF30",
                lineWidth: 1,
                radius: 2,
            }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_LEFT_EYEBROW,
            { color: "#30FF30", lineWidth: 1, radius: 2 }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_FACE_OVAL,
            { color: "#E0E0E0", lineWidth: 1, radius: 2 }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_LIPS,
            { color: "#E0E0E0", lineWidth: 1, radius: 2 }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_RIGHT_IRIS,
            { color: "#FF3030", lineWidth: 1, radius: 2 }
        );
        drawingUtils.drawConnectors(
            landmarks,
            FaceLandmarker.FACE_LANDMARKS_LEFT_IRIS,
            { color: "#30FF30", lineWidth: 1, radius: 2 }
        );
    }
}

export const drawPoseLandmarks = (results_pose) => {
    for (const landmarks of results_pose.landmarks) {
        drawingUtils.drawConnectors(
            landmarks,
            PoseLandmarker.POSE_CONNECTIONS,
            {
                color: "#95C8D4",
                lineWidth: 2,
                radius: 2,
            }
        );
        drawingUtils.drawLandmarks(landmarks, {
            color: "#EBF1ED",
            lineWidth: 1,
            radius: 2,
        });
    }
}

export const drawHandLandmarks = (results_hand) => {
    for (const landmarks of results_hand.landmarks) {
        drawingUtils.drawConnectors(
            landmarks,
            HandLandmarker.HAND_CONNECTIONS,
            {
                color: "#00FF00",
                lineWidth: 2,
                radius: 2,
            }
        );
        drawingUtils.drawLandmarks(landmarks, {
            color: "#FF0000",
            lineWidth: 1,
            radius: 2,
        });
    }

}

const getLandmarksOrNull = (array) => array && array.length > 0 ? array[0] : [];

export const processLandmarks  = async (results_hand, results_pose, results_face) => {

    let hand1 = [], hand2 = [];

    if (results_hand.landmarks.length == 2) {
        hand1 = results_hand.landmarks[0];
        hand2 = results_hand.landmarks[1];
    }

    if (results_hand.landmarks.length == 1) {
        hand1 = getLandmarksOrNull(results_hand.landmarks);
    }

    async function concatLandmarks(landmarks) {
        const { hand1, hand2, pose, face } = landmarks;
        const flattenLandmarks = (landmarks) =>
            landmarks
                ? landmarks.flatMap((res) => [res.x, res.y, res.z])
                : Array(21 * 3).fill(0);

        const poseArray = pose
            ? pose.flatMap((res) => [res.x, res.y, res.z, 1])
            : Array(33 * 4).fill(0);

        const faceArray = face
            ? flattenLandmarks(face)
            : Array(478 * 3).fill(0);
        const lhArray =
            hand1.length > 0 ? flattenLandmarks(hand1) : Array(21 * 3).fill(0);
        const rhArray =
            hand2.length > 0 ? flattenLandmarks(hand2) : Array(21 * 3).fill(0);
        const concatenatedArray = [
            ...poseArray,
            ...faceArray,
            ...lhArray,
            ...rhArray,
        ];
        return concatenatedArray;
    }

    const landmarks = {
        hand1: hand1,
        hand2: hand2,
        pose: getLandmarksOrNull(results_pose.landmarks),
        face: getLandmarksOrNull(results_face.faceLandmarks),
    };

    return await concatLandmarks(landmarks);
}