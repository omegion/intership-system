<template>
  <t-form-section @submitted="store">
    <template #title>Company Information</template>

    <template #description>
      Define information about the company. It is important that you provide
      valid information.
    </template>

    <template #form>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <jet-label for="name" value="Name" />
        <t-input
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          autocomplete="name"
          placeholder="Example Company"
        />
        <jet-input-error :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-4 pb-3">
        <FormLabel for="email" value="Email" />
        <el-input
          id="email"
          type="email"
          v-model="form.email"
          autocomplete="email"
          placeholder="example@company.com"
        />
        <FormInputError :message="form.errors.email" class="mt-2" />
      </div>

      <!-- Phone -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="phone" value="Phone" />
        <el-input
          id="phone"
          type="text"
          v-model="form.phone"
          placeholder="e.g. +49 70 700 7030"
        />
        <FormInputError :message="form.errors.phone" class="mt-2" />
      </div>

      <!-- Category -->
      <div class="col-span-6 sm:col-span-4 pb-3">
        <FormLabel for="categories" value="Category" />
        <CompanyCategorySearchAutocomplete
          v-model="form.categories"
          :initial-categories="initialCategories.data"
        />

        <FormInputError :message="form.errors.categories" class="mt-2" />
      </div>
      <div class="col-span-2 pt-6 -ml-2">
        <Link :href="route('company.category.create')">
          <el-button type="text">
            <span class="inline-flex">
              <PlusIcon class="-ml-1 mt-0.5 mr-0.5 h-4 w-4" />
              Add
            </span>
          </el-button>
        </Link>
      </div>
    </template>
  </t-form-section>
  <t-form-section @submitted="store" class="mt-8">
    <template #title>Location Information</template>

    <template #description>
      Define information about the company. It is important that you provide
      valid information.
    </template>

    <template #form>
      <!-- Address -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="address" value="Address" />
        <el-input
          id="address"
          v-model="form.address"
          type="textarea"
          placeholder="e.g. Example street, 1016, Berlin"
        />
        <FormInputError :message="form.errors.address" class="mt-2" />
      </div>

      <!-- Country -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="country" value="Country" />
        <CountrySelectBox
          id="country"
          v-model="form.country_id"
          :initial-options="initialCountries"
        />
        <FormInputError :message="form.errors.country_id" class="mt-2" />
      </div>
      <div class="col-span-2 pt-6 -ml-2">
        <Link :href="route('location.country.create')">
          <el-button type="text">
            <span class="inline-flex">
              <PlusIcon class="-ml-1 mt-0.5 mr-0.5 h-4 w-4" />
              Add
            </span>
          </el-button>
        </Link>
      </div>

      <!-- City -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="city" value="City" />
        <CitySelectBox
          id="city"
          v-model="form.city_id"
          :initial-options="initialCities"
        />
        <FormInputError :message="form.errors.city_id" class="mt-2" />
      </div>
      <div class="col-span-2 pt-6 -ml-2">
        <Link :href="route('location.city.create')">
          <el-button type="text">
            <span class="inline-flex">
              <PlusIcon class="-ml-1 mt-0.5 mr-0.5 h-4 w-4" />
              Add
            </span>
          </el-button>
        </Link>
      </div>
    </template>

    <template #actions>
      <jet-action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </jet-action-message>

      <t-button
        :class="{ 'opacity-45': form.processing }"
        :loading="form.processing"
      >
        Save
      </t-button>
    </template>
  </t-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import TButton from '@/Components/Utils/Button.vue'
import TFormSection from '@/Components/Utils/FormSection.vue'
import TInput from '@/Components/Utils/Input.vue'
import JetInputError from '@/Components/Utils/InputError.vue'
import JetLabel from '@/Components/Utils/Label.vue'
import JetActionMessage from '@/Components/Utils/ActionMessage.vue'
import JetSecondaryButton from '@/Components/Utils/SecondaryButton.vue'
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'
import FormLabel from '@/Components/Utils/Label'
import FormInputError from '@/Components/Utils/InputError'
import CompanyCategorySearchAutocomplete from '@/Pages/Company/Partials/Edit/CategorySearchAutocomplete'
import { PlusIcon } from '@heroicons/vue/solid'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  components: {
    CompanyCategorySearchAutocomplete,
    FormInputError,
    FormLabel,
    CitySelectBox,
    CountrySelectBox,
    JetActionMessage,
    TButton,
    TFormSection,
    TInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
    PlusIcon,
    Link
  },

  props: ['user', 'initialCountries', 'initialCities', 'initialCategories'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'POST',
        name: '',
        email: '',
        phone: '',
        address: '',
        country_id: '',
        city_id: '',
        categories: []
      })
    }
  },

  methods: {
    store() {
      this.form.post(route('company.store'), {
        preserveScroll: true
      })
    }
  }
})
</script>
