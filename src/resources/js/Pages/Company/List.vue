<template>
  <app-layout title="Company List">
    <template #header-title>Company List</template>
    <div class="mx-auto sm:px-6 lg:max-w-7xl lg:grid lg:grid-cols-5 lg:gap-x-8">
      <div class="lg:col-span-4 lg:border-r lg:border-gray-200 lg:pr-8">
        <div
          class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
        >
          <CompanyTable :companies="companies" />
        </div>
        <div class="pt-3">
          <pagination
            class="pt-2"
            :path="companies.path"
            :links="companies.links"
            :total="companies.total"
            :per-page="companies.per_page"
            :current-page="companies.current_page"
          />
        </div>
      </div>

      <div class="mt-4 lg:mt-0 col-auto">
        <h2 class="sr-only">Product information</h2>
        <p class="text-3xl text-gray-900">$192</p>
        <div class="mt-6">
          <h3 class="sr-only">Reviews</h3>
          <div class="flex items-center">
            <div class="flex items-center">
              <svg
                class="text-gray-900 h-5 w-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <!-- Heroicon name: solid/star -->
              <svg
                class="text-gray-900 h-5 w-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <!-- Heroicon name: solid/star -->
              <svg
                class="text-gray-900 h-5 w-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <!-- Heroicon name: solid/star -->
              <svg
                class="text-gray-900 h-5 w-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>

              <!-- Heroicon name: solid/star -->
              <svg
                class="text-gray-200 h-5 w-5 flex-shrink-0"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                aria-hidden="true"
              >
                <path
                  d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
                />
              </svg>
            </div>
            <p class="sr-only">4 out of 5 stars</p>
            <a
              href="#"
              class="
                ml-3
                text-sm
                font-medium
                text-indigo-600
                hover:text-indigo-500
              "
            >
              117 reviews
            </a>
          </div>
        </div>

        <form class="mt-10">
          <!-- Colors -->
          <div>
            <h3 class="text-sm text-gray-900 font-medium">Color</h3>

            <fieldset class="mt-4">
              <legend class="sr-only">Choose a color</legend>
              <div class="flex items-center space-x-3">
                <label
                  class="
                    -m-0.5
                    relative
                    p-0.5
                    rounded-full
                    flex
                    items-center
                    justify-center
                    cursor-pointer
                    focus:outline-none
                    ring-gray-400
                  "
                >
                  <input
                    type="radio"
                    name="color-choice"
                    value="White"
                    class="sr-only"
                    aria-labelledby="color-choice-0-label"
                  />
                  <p id="color-choice-0-label" class="sr-only">White</p>
                  <span
                    aria-hidden="true"
                    class="
                      h-8
                      w-8
                      bg-white
                      border border-black border-opacity-10
                      rounded-full
                    "
                  ></span>
                </label>
                <label
                  class="
                    -m-0.5
                    relative
                    p-0.5
                    rounded-full
                    flex
                    items-center
                    justify-center
                    cursor-pointer
                    focus:outline-none
                    ring-gray-400
                  "
                >
                  <input
                    type="radio"
                    name="color-choice"
                    value="Gray"
                    class="sr-only"
                    aria-labelledby="color-choice-1-label"
                  />
                  <p id="color-choice-1-label" class="sr-only">Gray</p>
                  <span
                    aria-hidden="true"
                    class="
                      h-8
                      w-8
                      bg-gray-200
                      border border-black border-opacity-10
                      rounded-full
                    "
                  ></span>
                </label>
                <label
                  class="
                    -m-0.5
                    relative
                    p-0.5
                    rounded-full
                    flex
                    items-center
                    justify-center
                    cursor-pointer
                    focus:outline-none
                    ring-gray-900
                  "
                >
                  <input
                    type="radio"
                    name="color-choice"
                    value="Black"
                    class="sr-only"
                    aria-labelledby="color-choice-2-label"
                  />
                  <p id="color-choice-2-label" class="sr-only">Black</p>
                  <span
                    aria-hidden="true"
                    class="
                      h-8
                      w-8
                      bg-gray-900
                      border border-black border-opacity-10
                      rounded-full
                    "
                  ></span>
                </label>
              </div>
            </fieldset>
          </div>

          <!-- Sizes -->
          <div class="mt-10">
            <div class="flex items-center justify-between">
              <h3 class="text-sm text-gray-900 font-medium">Size</h3>
              <a
                href="#"
                class="
                  text-sm
                  font-medium
                  text-indigo-600
                  hover:text-indigo-500
                "
              >
                Size guide
              </a>
            </div>

            <fieldset class="mt-4">
              <legend class="sr-only">Choose a size</legend>
              <div class="grid grid-cols-4 gap-4 sm:grid-cols-8 lg:grid-cols-4">
                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-gray-50
                    text-gray-200
                    cursor-not-allowed
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="XXS"
                    disabled
                    class="sr-only"
                    aria-labelledby="size-choice-0-label"
                  />
                  <p id="size-choice-0-label">XXS</p>

                  <div
                    aria-hidden="true"
                    class="
                      absolute
                      -inset-px
                      rounded-md
                      border-2 border-gray-200
                      pointer-events-none
                    "
                  >
                    <svg
                      class="
                        absolute
                        inset-0
                        w-full
                        h-full
                        text-gray-200
                        stroke-2
                      "
                      viewBox="0 0 100 100"
                      preserveAspectRatio="none"
                      stroke="currentColor"
                    >
                      <line
                        x1="0"
                        y1="100"
                        x2="100"
                        y2="0"
                        vector-effect="non-scaling-stroke"
                      />
                    </svg>
                  </div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="XS"
                    class="sr-only"
                    aria-labelledby="size-choice-1-label"
                  />
                  <p id="size-choice-1-label">XS</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="S"
                    class="sr-only"
                    aria-labelledby="size-choice-2-label"
                  />
                  <p id="size-choice-2-label">S</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="M"
                    class="sr-only"
                    aria-labelledby="size-choice-3-label"
                  />
                  <p id="size-choice-3-label">M</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="L"
                    class="sr-only"
                    aria-labelledby="size-choice-4-label"
                  />
                  <p id="size-choice-4-label">L</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="XL"
                    class="sr-only"
                    aria-labelledby="size-choice-5-label"
                  />
                  <p id="size-choice-5-label">XL</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="2XL"
                    class="sr-only"
                    aria-labelledby="size-choice-6-label"
                  />
                  <p id="size-choice-6-label">2XL</p>

                  <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Active: "border", Not Active: "border-2"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        Checked: "border-indigo-500", Not Checked: "border-transparent"
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      -->
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>

                <!-- Active: "ring-2 ring-indigo-500" -->
                <label
                  class="
                    group
                    relative
                    border
                    rounded-md
                    py-3
                    px-4
                    flex
                    items-center
                    justify-center
                    text-sm
                    font-medium
                    uppercase
                    hover:bg-gray-50
                    focus:outline-none
                    sm:flex-1 sm:py-6
                    bg-white
                    shadow-sm
                    text-gray-900
                    cursor-pointer
                  "
                >
                  <input
                    type="radio"
                    name="size-choice"
                    value="3XL"
                    class="sr-only"
                    aria-labelledby="size-choice-7-label"
                  />
                  <p id="size-choice-7-label">3XL</p>
                  <div
                    class="absolute -inset-px rounded-md pointer-events-none"
                    aria-hidden="true"
                  ></div>
                </label>
              </div>
            </fieldset>
          </div>

          <button
            type="submit"
            class="
              mt-10
              w-full
              bg-indigo-600
              border border-transparent
              rounded-md
              py-3
              px-8
              flex
              items-center
              justify-center
              text-base
              font-medium
              text-white
              hover:bg-indigo-700
              focus:outline-none
              focus:ring-2
              focus:ring-offset-2
              focus:ring-indigo-500
            "
          >
            Add to bag
          </button>
        </form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Pagination from '@/Components/Utils/Pagination'
import { Link } from '@inertiajs/inertia-vue3'
import { BadgeCheckIcon } from '@heroicons/vue/solid'
import CompanyTable from '@/Pages/Company/Partials/List/Table'

export default defineComponent({
  props: ['companies'],

  components: {
    CompanyTable,
    AppLayout,
    Pagination,
    Link,
    BadgeCheckIcon
  }
})
</script>
