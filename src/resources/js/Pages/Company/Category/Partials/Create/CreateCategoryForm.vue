<template>
  <FormSection @submitted="store">
    <template #title>Internship Information</template>

    <template #description>
      Provide internship details. Provide when your internship starts, when it
      ends.
    </template>

    <template #form>
      <!-- Start & End dates -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel for="dates" value="Start and end dates" />
        {{ form.starts_at }}
        <el-date-picker
          v-model="dates"
          type="daterange"
          range-separator="To"
          start-placeholder="Start date"
          end-placeholder="End date"
          format="DD/MM/YYYY"
          value-format="YYYY-MM-DD HH:MM:ss"
          @change="getDates"
        ></el-date-picker>
        <FormInputError :message="form.errors.starts_at" class="mt-2" />
        <FormInputError :message="form.errors.ends_at" class="mt-2" />
      </div>

      <!-- Name -->
      <div class="col-span-6 sm:col-span-4">
        <FormLabel
          for="education_year"
          value="Education year"
          helper="Education year is the year you are at on your university. If you are studying for 2 years at the university, your education year is 2."
        />
        <el-input-number
          id="education_year"
          v-model="form.education_year"
          :min="1"
          :max="10"
        />
        <FormInputError :message="form.errors.name" class="mt-2" />
      </div>
    </template>
  </FormSection>
  <FormSection @submitted="store" class="mt-8">
    <template #title>Location Information</template>

    <template #description>Update company's location information.</template>

    <template #form>
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
        Create
      </el-button>
    </template>
  </FormSection>
</template>

<script>
import { defineComponent } from 'vue'
import TInput from '@/Components/Utils/Input.vue'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'
import ActionMessage from '@/Components/Utils/ActionMessage'
import FormLabel from '@/Components/Utils/Label'
import FormInputError from '@/Components/Utils/InputError'
import FormSection from '@/Components/Utils/FormSection'
import CountrySelectBox from '@/Components/Utils/CountrySelectBox'
import CitySelectBox from '@/Components/Utils/CitySelectBox'
import { PlusIcon } from '@heroicons/vue/solid'
import { Link } from '@inertiajs/inertia-vue3'
import moment from 'moment'

export default defineComponent({
  name: 'CreateCategoryForm',
  components: {
    CitySelectBox,
    CountrySelectBox,
    FormSection,
    FormInputError,
    FormLabel,
    ActionMessage,
    ActionSuccessMessage,
    PlusIcon,
    Link
  },
  props: ['company', 'initialCountries', 'initialCities'],

  data() {
    return {
      dates: null,
      form: this.$inertia.form({
        _method: 'POST',
        name: '',
        education_year: 1,
        starts_at: null,
        ends_at: null,
        country_id: this.company.country_id,
        city_id: this.company.city_id
      })
    }
  },

  methods: {
    store() {
      this.form.post(route('internship.store', { company: this.company.id }), {
        preserveScroll: true
      })
    },
    getDates(dates) {
      this.form.starts_at = dates[0]
      this.form.ends_at = dates[1]
    }
  }
})
</script>
