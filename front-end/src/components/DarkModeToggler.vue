<template>
  <div class="flex items-center justify-center mx-auto absolute top-5 right-0 left-1/3">
    <div class="flex justify-end items-center space-x-2 mx-auto relative">
      <span class="text-xs font-extralight"> Light </span>
      <div>
        <input type="checkbox" name="checkbox" id="checkbox" class="hidden" />
        <label for="checkbox" class="cursor-pointer">
          <div class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-2">
            <div class="w-4 h-4 bg-white rounded-full shadow"></div>
          </div>
        </label>
      </div>
      <span class="text-xs font-semibold"> Dark </span>
    </div>
  </div>
</template>

<script>
const checkbox = document.querySelector("#checkbox");
const html = document.querySelector("html");

const toggleDarkMode = function () {
  checkbox.checked ? html.classList.add("dark") : html.classList.remove("dark");
};

//calling the function directly
toggleDarkMode();
checkbox.addEventListener("click", toggleDarkMode);
</script>

<style>
#checkbox:checked + label .switch-ball {
  background-color: white;
  transform: translateX(24px);
  transition: transform 0.3s linear;
}
</style>
