<section class="font-sans container flex flex-col mx-auto my-8 text-midnight-blue">
  <div class="w-full md:w-4/5 mx-auto text-center p-4">
    <h1 class="font-xl font-bold">Accordion</h1>
  </div>
  
  <!-- START Open Multiple Accordion -->
  <div class="w-full md:w-4/5 mx-auto p-4">
    <p>Open <strong>multiple</strong></p>
    <div class="shadow-md">
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs" checked>
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-multi-one">Label One</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-multi-two">Label Two</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-multi-three">Label Three</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
    </div>
  </div>
  
  <!-- START Open One Accordion -->
  <div class="w-full md:w-4/5 mx-auto p-4">
    <p>Open <strong>one</strong></p>
    <div class="shadow-md">
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0" id="tab-single-one" type="radio" name="tabs2">
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-single-one">Label One</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0" id="tab-single-two" type="radio" name="tabs2">
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-single-two">Label Two</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
      <div class="tab w-full overflow-hidden border-t">
        <input class="absolute opacity-0" id="tab-single-three" type="radio" name="tabs2">
        <label class="block p-5 leading-normal cursor-pointer font-bold" for="tab-single-three">Label Three</label>
        <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-midnight-blue leading-normal">
          <p class="p-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur, architecto, explicabo perferendis nostrum, maxime impedit atque odit sunt pariatur illo obcaecati soluta molestias iure facere dolorum adipisci eum? Saepe, itaque.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
    /* Javascript to close the radio button version by clicking it again */
var myRadios = document.getElementsByName("tabs2");
var setCheck;
var x = 0;
for (x = 0; x < myRadios.length; x++) {
  myRadios[x].onclick = function () {
    if (setCheck != this) {
      setCheck = this;
    } else {
      this.checked = false;
      setCheck = null;
    }
  };
}
</script>

<style>
    /* Tab content - closed */
.tab-content {
  max-height: 0;
  -webkit-transition: max-height 0.35s;
  -o-transition: max-height 0.35s;
  transition: max-height 0.35s;
}

/* :checked - resize to full height */
.tab input:checked ~ .tab-content {
  max-height: 100vh;
}

/* Label formatting when open */
.tab input:checked + label {
  /*@apply border-l-2 border-indigo-500 bg-gray-100 text-indigo*/
  border-left-width: 2px; 
  border-color: #05053D;
  background-color: #f8fafc;
  color: #05053D; /*.text-indigo*/
}

/* Icon */
.tab label::after {
  float: right;
  right: 0;
  top: 0;
  display: block;
  width: 1.5em;
  height: 1.5em;
  line-height: 1.5;
  font-size: 1.25rem;
  text-align: center;
  -webkit-transition: all 0.35s;
  -o-transition: all 0.35s;
  transition: all 0.35s;
}

/* Open Multiple Icon Formatting - Closed */
.tab input[type="checkbox"] + label::after {
  content: ">";
  font-weight: bold; /*.font-bold*/
  border-width: 1px; /*.border*/
  border-radius: 9999px; /*.rounded-full */
  border-color: #b8c2cc; /*.border-grey*/
  display: flex;
  justify-content: center;
  align-items: center;
}

/* Open Multiple Icon Formatting - Open */
.tab input[type="checkbox"]:checked + label::after {
  transform: rotate(90deg);
  background-color: #05053D; /*.bg-indigo*/
  color: #f8fafc; /*.text-grey-lightest*/
}

/* Open One Icon Formatting - Closed */
.tab input[type="radio"] + label::after {
  content: "\25BE";
  font-weight: bold; /*.font-bold*/
  border-width: 1px; /*.border*/
  border-radius: 9999px; /*.rounded-full */
  border-color: #05053D /*.border-grey*/
}

/* Open One Icon Formatting - Open */
.tab input[type="radio"]:checked + label::after {
  transform: rotateX(180deg);
  background-color: #05053D; /*.bg-indigo*/
  color: #f8fafc; /*.text-grey-lightest*/
}

</style>