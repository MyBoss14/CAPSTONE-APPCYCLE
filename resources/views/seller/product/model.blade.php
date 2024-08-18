<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    /* Overlay styles */
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
      z-index: 9999; /* Ensure it's above everything else */
      display: none; /* Initially hidden */
    }
    .toast-center {
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        }

    .overlay-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
      color: white;
    }


</style>



<div class="overlay" id="overlay">
    <div class="overlay-content">

            <style>
                        html, body {
                background-color: #2e7e92;
                }

                .robot svg {
                position: absolute;
                top: 50%;
                left: 50%;
                display: block;
                margin: 0 auto;
                margin-left: -300px;
                transform: scale(0.6) translate(0, -100%);
                transform-origin: center;
                height: 800px;
                width: 600px;
                }

                .credit {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 100%;
                text-align: center;
                color: rgba(255,255,255,0.3);
                }

                .credit a {
                color: rgba(255,255,255,0.6);
                }

                @-webkit-keyframes robot_bounce{

                        0%{
                        transform:translateY(80px)}

                        100%{
                        transform:translateY(30px)}}

                        @keyframes robot_bounce{

                        0%{
                        transform:translateY(80px)}

                        100%{
                        transform:translateY(30px)}}

                        @-webkit-keyframes shadow{

                        0%{
                        transform:scale(1.5,1.2);
                    }

                        100%{
                        transform:scale(1,1);
                    }}

                        @keyframes shadow{

                        0%{
                        transform:scale(1.5,1.2);
                        opacity:0.4}

                        100%{
                        transform:scale(1,1);
                        opacity:0.2}}

                        @-webkit-keyframes arms_bounce_left{

                        0%{
                        transform:rotate(0deg)}

                        100%{
                        transform:rotate(-15deg)}}

                        @keyframes arms_bounce_left{

                        0%{
                        transform:rotate(0deg)}

                        100%{
                        transform:rotate(-15deg)}}

                        @-webkit-keyframes arms_bounce_right{

                        0%{
                        transform:rotate(0deg)}

                        100%{
                        transform:rotate(15deg)}}

                        @keyframes arms_bounce_right{

                        0%{
                        transform:rotate(0deg)}

                        100%{
                        transform:rotate(15deg)}}

                        @-webkit-keyframes eyes_blink{

                        0%{
                        transform:scale(1,1)}

                        90%{
                        transform:scale(1,1)}

                        95%{
                        transform:scale(0.8,0)}

                        100%{
                        transform:scale(1,1)}}

                        @keyframes eyes_blink{

                        0%{
                        transform:scale(1,1)}

                        90%{
                        transform:scale(1,1)}

                        95%{
                        transform:scale(0.8,0)}

                        100%{
                        transform:scale(1,1)}}

                        #body{
                        animation:robot_bounce 1.1s ease-in-out 0s infinite alternate}

                        #head{
                        animation:robot_bounce 1.1s ease-in-out 0.05s infinite alternate}

                        #arms{
                        animation:robot_bounce 1.1s ease-in-out 0.1s infinite alternate}

                        #arms #left{
                        transform-origin:center right;
                        animation:arms_bounce_left 1.1s ease-in-out 0s infinite alternate}

                        #arms #right{
                        transform-origin:center left;
                        animation:arms_bounce_right 1.1s ease-in-out 0s infinite alternate}

                        #eyes ellipse{
                        transform-origin:center center;
                        animation:eyes_blink 2s ease-out 0s infinite alternate}

                        #hover ellipse{
                        transform-origin:center center;
                        animation:shadow 1.1s ease-in-out 0s infinite alternate}

            </style>
            <div class="robot">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
                <g id="hover">
                    <ellipse id="shadow_2_" opacity="0.4" fill="#2C3332" cx="300" cy="703.375" rx="88.971" ry="30.625"></ellipse>
                </g>
                <g id="arms">
                    <g id="left">
                        <path id="arm_1_" fill="#BABEB7" d="M183.975,430.936c-50.27-21.595-96.437,29.654-96.132,54.383
                            c0.06,4.868,7.836,11.424,11.509,7.079c12.145-14.369,36.979-35.733,55.676-16.486
                            C156.498,477.423,189.086,433.132,183.975,430.936z"></path>
                        <g id="hand_1_">
                            <path id="shadow" fill="#BABEB7" d="M63.712,520.545l5.657-7.071c0,0-11.453-8.997-9.402-12.554
                                c4.469-7.751,15.935-9.515,25.612-3.936c9.676,5.579,13.898,16.385,9.43,24.136c-1.736,3.013-7.363,0.091-7.363,0.091
                                l-5.657,7.071l0.058,6.027c8.473,0.83,16.454-1.564,21.692-6.847c1.235-1.245,6.329-7.287,7.229-8.85
                                c1.826-3.166-7.579-26.607-18.73-33.036c-8.361-4.82-31.172-5.074-31.172-5.074s-5.691,5.814-8.805,11.216
                                c-5.77,10.006-2.253,23.271,7.678,32.486L63.712,520.545z"></path>
                            <path id="top" fill="#DCE0DA" d="M69.37,513.474c-5.443-5.817-7.202-13.631-3.746-19.625c4.469-7.751,15.935-9.514,25.612-3.935
                                c9.676,5.578,13.899,16.385,9.43,24.135c-2.575,4.468-7.478,6.932-13.02,7.162l0.058,6.027
                                c10.471,1.026,20.192-2.873,24.911-11.06c6.976-12.099,0.385-28.965-14.719-37.673c-15.104-8.708-33.002-5.957-39.977,6.142
                                c-5.769,10.007-2.253,23.271,7.679,32.486L69.37,513.474z"></path>
                        </g>
                    </g>
                    <g id="right">
                        <path id="arm" fill="#DCE0DA" d="M416.025,430.936c50.27-21.595,96.437,29.654,96.131,54.383
                            c-0.059,4.868-7.836,11.424-11.509,7.079c-12.145-14.369-36.979-35.733-55.676-16.486
                            C443.502,477.423,410.914,433.132,416.025,430.936z"></path>
                        <g id="hand">
                            <path id="shadow_1_" fill="#BABEB7" d="M536.287,520.545l-5.656-7.071c0,0,11.453-8.997,9.402-12.554
                                c-4.469-7.751-15.936-9.515-25.612-3.936s-13.898,16.385-9.43,24.136c1.736,3.013,7.362,0.091,7.362,0.091l5.657,7.071
                                l-0.058,6.027c-8.474,0.83-16.455-1.564-21.692-6.847c-1.235-1.245-6.329-7.287-7.229-8.85
                                c-1.826-3.166,7.578-26.607,18.73-33.036c8.361-4.82,31.172-5.074,31.172-5.074s5.691,5.814,8.805,11.216
                                c5.77,10.006,2.253,23.271-7.678,32.486L536.287,520.545z"></path>
                            <path id="top_1_" fill="#DCE0DA" d="M530.631,513.474c5.443-5.817,7.201-13.631,3.745-19.625
                                c-4.469-7.751-15.935-9.514-25.612-3.935c-9.676,5.578-13.898,16.385-9.43,24.135c2.575,4.468,7.479,6.932,13.02,7.162
                                l-0.058,6.027c-10.472,1.026-20.192-2.873-24.911-11.06c-6.975-12.099-0.385-28.965,14.72-37.673s33.003-5.957,39.978,6.142
                                c5.769,10.007,2.252,23.271-7.68,32.486L530.631,513.474z"></path>
                        </g>
                    </g>
                </g>
                <g id="body">
                    <g id="chassie">
                        <g id="base">
                            <path fill="#DCE0DA" d="M137.424,525.622c0-47.887,60.669-219.342,162.576-219.342c101.907,0,162.576,171.854,162.576,219.342
                                c0,47.489-137.88,56.438-162.576,56.438C275.303,582.06,137.424,573.511,137.424,525.622z"></path>
                        </g>
                        <g id="highlight">
                            <defs>
                                <path id="SVGID_1_" d="M137.424,525.622c0-47.887,60.669-219.342,162.576-219.342c101.907,0,162.576,171.854,162.576,219.342
                                    c0,47.489-137.88,56.438-162.576,56.438C275.303,582.06,137.424,573.511,137.424,525.622z"></path>
                            </defs>
                            <clipPath id="SVGID_2_">
                                <use xlink:href="#SVGID_1_" overflow="visible"></use>
                            </clipPath>
                            <path clip-path="url(#SVGID_2_)" fill="#BABEB7" d="M455.667,419c0,0-38.299,61.503-156.983,61.503
                                c-67.685,0-86.351,14.831-96.684,39.164S203.368,588,298.684,588s1.816,21.923,1.816,21.923s-198.833-42.589-198.833-43.589
                                s54.333-215,54.333-215L455.667,419z"></path>
                        </g>
                    </g>
                    <g id="progress-indicator">
                        <g id="divet">
                            <path id="highlight-bottom" fill="#EAECE8" d="M425.182,524.775l-4.682-21.211c0,0-48.18,19.563-120.34,19.563
                                s-120.82-19.079-120.82-19.079l-4.542,20.636c0,0,37.523,20.052,125.363,20.052S425.182,524.775,425.182,524.775z"></path>
                            <path id="divet-bottom" fill="#4C4C4C" d="M420.682,521.823l-4.514-16.654c0,0-46.447,17.959-116.014,17.959
                                c-69.566,0-116.477-17.551-116.477-17.551l-4.379,16.159c0,0,36.174,18.597,120.856,18.597
                                C384.837,540.333,420.682,521.823,420.682,521.823z"></path>
                            <polygon id="shadow-right_1_" fill="#BABEB7" points="416.168,505.169 420.5,503.564 425.182,524.775 420.682,521.823 			"></polygon>
                            <polygon id="shadow-left" fill="#8F918D" points="183.677,505.577 179.34,504.049 174.797,524.685 179.297,521.736 			"></polygon>
                            <path id="shadow-bottom" fill="#BABEB7" d="M204.738,530.305l-5.786,2.959c0,0-8.125-2.072-14.702-4.556
                                s-9.453-4.023-9.453-4.023l4.5-2.948c0,0,4.039,2.192,11.313,4.463S204.738,530.305,204.738,530.305z"></path>
                        </g>
                        <g id="completed">
                            <path id="blue" fill="#84D3E8" d="M300.154,523.128c-69.566,0-116.477-17.551-116.477-17.551l-4.379,16.159
                                c0,0,36.174,18.597,120.856,18.597c28.812,0,51.965-2.144,69.983-4.971l-1.808-18.073
                                C349.822,520.518,326.67,523.128,300.154,523.128z"></path>
                            <path id="blue-shadow" fill="#6DADBC" d="M208.568,512.712c-15.682-3.741-24.93-7.135-24.93-7.135l-4.437,16.159
                                c0,0,8.037,4.175,25.537,8.568C205.625,524.125,206,520.875,208.568,512.712z"></path>
                        </g>
                    </g>
                </g>

                <g id="head">
                    <g id="face">
                        <path id="screen-shadow" fill="#9AB2B0" d="M418.268,235.276C377.932,233.144,327.52,232,300.003,232
                            c-27.517,0-77.766,1.144-118.102,3.276c-34.071,1.801-41.222,17.035-41.222,69.742s3.15,88.311,24.65,107.819
                            c35.831,32.511,101.258,47.829,134.673,47.829c33.832,0,99.06-15.318,134.891-47.829c21.5-19.508,24.758-55.112,24.758-107.819
                            S452.338,237.078,418.268,235.276z"></path>
                        <path id="screen" fill="#A4BCB9" d="M164.381,353.965c0,55.225,107.043,76.693,135.619,76.693
                            c28.576,0,135.618-21.469,135.618-76.693c0-100.027-60.717-123.293-135.618-123.293
                            C225.101,230.671,164.381,253.938,164.381,353.965z"></path>
                        <path id="case_x5F_shadow" fill="#EAECE8" d="M300,239c27.54,0,78.739,1.16,119.383,3.309c15.837,0.837,18.06,4.715,19.388,7.032
                            c5.026,8.771,5.671,29.167,5.671,45.955c0,49.954-0.156,81.738-16.287,96.374c-31.639,28.708-96.014,44.997-128.154,44.997
                            c-32.048,0-95.295-16.289-126.934-44.997c-16.039-14.552-17.176-46.356-17.176-96.374c0-16.825,0.638-37.258,5.614-46
                            c1.395-2.45,3.503-6.153,19.279-6.987C221.426,240.16,272.541,239,300,239 M300,210.5c-80.5,0-160.11,7.167-160.11,60.795
                            S141.095,385.151,162.971,405C199.429,438.08,266,453.666,300,453.666c34.424,0,100.792-15.586,137.25-48.666
                            c21.876-19.849,23.191-80.076,23.191-133.705S380.5,210.5,300,210.5z"></path>
                        <path id="case" fill="#DCE0DA" d="M300,248c27.54,0,78.739,1.16,119.383,3.309c15.837,0.837,18.06,4.715,19.388,7.032
                            c5.026,8.771,5.671,29.167,5.671,45.955c0,49.954-3.156,81.738-19.287,96.374c-31.639,28.708-93.014,43.997-125.154,43.997
                            c-32.048,0-93.295-15.289-124.934-43.997c-16.039-14.552-19.176-46.356-19.176-96.374c0-16.825,0.638-37.258,5.614-46
                            c1.395-2.45,3.503-6.153,19.279-6.987C221.426,249.16,272.541,248,300,248 M300,230c-27.999,0-79.126,1.164-120.167,3.333
                            c-34.667,1.833-41.943,17.333-41.943,70.962s3.205,89.856,25.081,109.705C199.429,447.08,266,462.666,300,462.666
                            c34.424,0,100.792-15.586,137.25-48.666c21.876-19.849,25.191-56.076,25.191-109.705s-7.441-69.129-42.108-70.962
                            C379.292,231.164,327.998,230,300,230L300,230z"></path>
                    </g>
                    <g id="eyes">
                        <ellipse id="left_1_" fill="#2C3332" cx="231" cy="316.667" rx="6.333" ry="17"></ellipse>
                        <ellipse id="right_1_" fill="#2C3332" cx="369" cy="316.667" rx="6.334" ry="17"></ellipse>
                    </g>
                    <g id="indicators">
                        <path id="mount" fill="#DCE0DA" d="M354.333,220.333c0-29.916-24.252-54.167-54.167-54.167c-29.916,0-54.167,24.251-54.167,54.167
                            c0,4.667,24.251,4.667,54.167,4.667C330.081,225,354.333,225,354.333,220.333z"></path>
                        <g id="leds">
                            <circle id="yellow" fill="#F0C419" cx="300.418" cy="207" r="8.084"></circle>
                            <circle id="red" fill="#E64C3C" cx="324.67" cy="206" r="8.084"></circle>
                            <circle id="green" fill="#4EBA64" cx="275.33" cy="206" r="8.083"></circle>
                        </g>
                    </g>
                </g>
                </svg>
                   <!-- Font Awesome spinner icon -->

            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="mt-5 fa-3x">
                <i class="fas fa-cog fa-spin"></i>
            </div>


        <br>
        <br>



    </div>
  </div>

  <div class="form-group wsus__input mt-4">
    <label for="materials"></label>
    <br>
    <label for="inputState">Category :</label>
    <select id="materialSelect" name="material">
        <option value=""></option>
        <option value="metal">Metal</option>
        <option value="ewaste">E-waste</option>
        <option value="cloth">Textile</option>
    </select>
    <input type="hidden" name="category" id="categoryInput">
</div>

<div class="form-group wsus__input">
    {{-- upload image --}}
    <div class="form-group wsus__input">
        <label for="inputState">Image:</label>
        <img  id="imagePreview" style="max-height:300px;" />
        <br>
        <br>
        <input name="image" id="imageUpload" type="file" accept="image/*"  class="form-control"/>
    </div>
</div>















    <br>
    <br />




    <div id="label-container"></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>


{{-- set value sa category base on the material name --}}
<script>
    // Mocking the 'init' function
  function init() {
    return new Promise((resolve) => {
      setTimeout(resolve, 2000); // Simulating initialization delay
    });
  }
    document.getElementById('materialSelect').addEventListener('change', function() {
        var material = this.value;
        var categoryInput = document.getElementById('categoryInput');

        // set id category base sa ilang value name
        if (material === 'ewaste') {
            categoryInput.value = '19';
        }
         else if (material === 'metal') {
            categoryInput.value = '20';
        }
         else if (material === 'cloth') {
            categoryInput.value = '21';
        }
    });
</script>

<script type="text/javascript">
      // More API functions here:
      // https://github.com/googlecreativelab/teachablemachine-community/tree/master/libraries/image

      // the link to your model provided by Teachable Machine export panel
      const URL = "https://teachablemachine.withgoogle.com/models/ZCbbx8HUK/";

      let model, webcam, labelContainer, maxPredictions;

      // Load the image model and setup the webcam
      async function init() {
        const modelURL = URL + "model.json";
        const metadataURL = URL + "metadata.json";

        // load the model and metadata
        model = await tmImage.load(modelURL, metadataURL);
        maxPredictions = model.getTotalClasses();

        // append elements to the DOM
        labelContainer = document.getElementById("label-container");
        for (let i = 0; i < maxPredictions; i++) {
          // and class labels
          labelContainer.appendChild(document.createElement("div"));
        }
      }

      // run the webcam image through the image model
      async function predict() {
        await new Promise((resolve) => setTimeout(resolve, 3000));

        // predict can take in an image, video or canvas html element
        var image = document.getElementById("imagePreview");
        const prediction = await model.predict(image, false);


        let bestMatch = prediction[0];
        for (let i = 1; i < prediction.length; i++) {
          if (prediction[i].probability > bestMatch.probability) {
            bestMatch = prediction[i];
          }
        }

        const selectedMaterial =
          document.getElementById("materialSelect").value;

        if (bestMatch.className.trim() === selectedMaterial) {
          document.getElementById("submitButton").hidden = false;
          toastr.success('YOU CAN NOW PROCEED TO FILL UP THE PRODUCT DETAILS<br><br>SUBMIT BUTTON IS NOW AVAILABLE', 'SUCCESS!', {
                            positionClass: 'toast-center',
                            });

        } else {
          document.getElementById("submitButton").hidden = true;
          toastr.error('<br>PLEASE REFRESH AND UPLOAD A CLEARER IMAGE or <br> SUBMIT THROUGH MANUAL ADMIN APPROVAL <br> <a href="{{route('seller.products.create')}}" class="btn btn-success fs-6" style="margin-left:30px; margin-top:5px;">ADMIN APPROVAL</a>' , "Mismatched Item and Category", {
    positionClass: 'toast-center',
    closeButton: true,
    onclick: function() {
        window.location.href = "{{ route('seller.products.create') }}";
    }
});
        }
        document.getElementById("overlay").style.display = "none";



      }

      function readURL(input) {
        document.getElementById("overlay").style.display = "block";
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            document.getElementById("imagePreview").src = e.target.result;
            document.getElementById("imagePreview").style.display = "none";
            document.getElementById("imagePreview").style.display = "block";
          };
          reader.readAsDataURL(input.files[0]);
          init().then(() => {
            predict();
          });
        }
      }
      document
        .getElementById("imageUpload")
        .addEventListener("change", function () {
          readURL(this);
        });
</script>
