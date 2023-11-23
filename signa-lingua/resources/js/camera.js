

document.addEventListener("DOMContentLoaded", function () {
    const cameraFeed = document.getElementById("camera-feed");
    const cameraBtn = document.getElementById("camera-btn");
    let streamStarted = false;
    const placeholder = "assets/images/placeholder.png";

    function sleep(ms) {
        return new Promise((resolve) => setTimeout(resolve, ms));
    }

    cameraFeed.src = placeholder;
    cameraBtn.onclick = async () => {
        const videoURL = cameraFeed.getAttribute("data-video-feed-url");
        console.log(videoURL);
        streamStarted = !streamStarted;
        cameraFeed;
        if (streamStarted) {
            cameraBtn.innerText = "Stop Camera";
            cameraFeed.src = videoURL;
        } else {
            cameraBtn.innerText = "Start Camera";
            // Stop the stream
            axios
                .post("/stop-video")
                .then((response) => {
                    // Handle the response from Laravel
                    console.log(response.data);
                })
                .catch((error) => {
                    // Handle errors
                    console.error("Error:", error);
                });
            cameraFeed.src = videoURL;
            await sleep(1000);
            cameraFeed.src = placeholder;
        }
    };

});
