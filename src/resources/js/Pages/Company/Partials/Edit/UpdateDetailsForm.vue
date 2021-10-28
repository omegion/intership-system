<template>
  <FormSection @submitted="updateCompanyInformation">
    <template #title>Basic Information</template>

    <template #description>Update company's information.</template>

    <template #form>
      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="name" value="Name" />
        <el-input
          id="name"
          type="text"
          v-model="form.name"
          autocomplete="name"
        />
        <InputError :message="form.errors.name" class="mt-2" />
      </div>

      <!-- Email -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="email" value="Email" />
        <el-input id="email" type="email" v-model="form.email" />
        <InputError :message="form.errors.email" class="mt-2" />
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
        <InputError :message="form.errors.phone" class="mt-2" />
      </div>

      <!-- Category -->
      <div class="col-span-6 sm:col-span-4 pb-3">
        <FormLabel for="email" value="Category" />
        <CompanyCategorySearchAutocomplete
          v-model="form.categories"
          :initial-categories="initialCategories.data"
        />

        <InputError :message="form.errors.email" class="mt-2" />
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
  </FormSection>
  <FormSection @submitted="updateCompanyInformation" class="mt-8">
    <template #title>Location Information</template>

    <template #description>Update company's location information.</template>

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
        <InputError :message="form.errors.address" class="mt-2" />
      </div>

      <!-- Country -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="country" value="Country" />
        <CountrySelectBox
          id="country"
          v-model="form.country_id"
          :initial-options="initialCountries"
        />
        <InputError :message="form.errors.country_id" class="mt-2" />
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
        <InputError :message="form.errors.city_id" class="mt-2" />
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
      <action-message :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </action-message>

      <el-button
        :class="{ 'opacity-45': form.processing }"
        type="black"
        native-type="submit"
        class="text-xs tracking-widest uppercase"
        :loading="form.processing"
      >
        Save
      </el-button>
    </template>
  </FormSection>
</template>

<script>
import { defineComponent } from 'vue'
import InputError from '@/Components/Utils/InputError.vue'
import ActionMessage from '@/Components/Utils/ActionMessage.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'
import FormLabel from '@/Components/Utils/Label'
import FormSection from '@/Components/Utils/FormSection'
import Autocomplete from '@/Components/Utils/Autocomplete'
import CompanyCategorySearchAutocomplete from '@/Pages/Company/Partials/Edit/CategorySearchAutocomplete'
import { PlusIcon } from '@heroicons/vue/solid'
import { Link } from '@inertiajs/inertia-vue3'

export default defineComponent({
  name: 'UpdateDetailsForm',
  components: {
    CompanyCategorySearchAutocomplete,
    PlusIcon,
    Autocomplete,
    FormSection,
    FormLabel,
    CitySelectBox,
    CountrySelectBox,
    ActionSuccessMessage,
    ActionMessage,
    Link,
    InputError
  },

  props: ['company', 'initialCountries', 'initialCities', 'initialCategories'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        name: this.company.name,
        email: this.company.email,
        phone: this.company.phone,
        address: this.company.address,
        country_id: this.company.country_id,
        city_id: this.company.city_id,
        categories: this.company.category_ids
      })
    }
  },

  methods: {
    updateCompanyInformation() {
      this.form.post(route('company.update', { company: this.company.id }), {
        errorBag: 'updateCompanyInformation',
        preserveScroll: true
      })
    },
    searchInCategory() {}
  }
})
</script>
