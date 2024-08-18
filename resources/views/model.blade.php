{{-- e append nalang ni sa product create....  --}}


<div>Teachable Machine Image Model with upload</div>



    <label for="materials">Choose a material:</label>
    <select id="materialSelect" name="materials">
      <option value="plastic">Plastic</option>
      <option value="metal">Metal</option>
      <option value="cloth">Cloth</option>
    </select>

    <button id="submitButton" disabled>Submit</button><br />

    {{-- upload image --}}
    <div class="form-group">
        <label>Product Image</label>
        <img  id="imagePreview" style="height: 300px" />
        <input name="image" id="imageUpload" type="file" accept="image/*"  class="form-control"/>
    </div>




    <div id="label-container"></div>
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@latest/dist/tf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@teachablemachine/image@latest/dist/teachablemachine-image.min.js"></script>

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
          document.getElementById("submitButton").disabled = false;
        } else {
          document.getElementById("submitButton").disabled = true;
        }

      }

      function readURL(input) {
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
