<template>
  <t-form-section @submitted="updateCompanyVerificationInformation">
    <template #title>Verification Information</template>

    <template #description>
      Update company's verification information. You can change the verification
      information.
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <Label for="verified_at" value="Verified" />
        <el-switch id="verified_at" v-model="verifiedAtHolder" />
        <InputError :message="form.errors.verified_at" class="mt-2" />
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        <ActionSuccessMessage />
      </action-message>

      <Button
        :class="{ 'opacity-45': form.processing }"
        :loading="form.processing"
      >
        Save
      </Button>
    </template>
  </t-form-section>
</template>

<script>
import { defineComponent } from 'vue'
import Button from '@/Components/Utils/Button.vue'
import TFormSection from '@/Components/Utils/FormSection.vue'
import TInput from '@/Components/Utils/Input.vue'
import InputError from '@/Components/Utils/InputError.vue'
import Label from '@/Components/Utils/Label.vue'
import ActionMessage from '@/Components/Utils/ActionMessage.vue'
import moment from 'moment'
import ActionSuccessMessage from '@/Components/Utils/ActionSuccessMessage'

export default defineComponent({
  name: 'UpdateVerification',
  components: {
    ActionSuccessMessage,
    ActionMessage,
    Button,
    TFormSection,
    TInput,
    InputError,
    Label
  },

  props: ['company'],

  data() {
    return {
      form: this.$inertia.form({
        _method: 'PUT',
        verified_at: this.company.verified_at
      })
    }
  },

  methods: {
    updateCompanyVerificationInformation() {
      this.form.post(
        route('company.updateVerification', { company: this.company.id }),
        {
          errorBag: 'updateCompanyVerificationInformation',
          preserveScroll: true
        }
      )
    }
  },
  computed: {
    verifiedAtHolder: {
      get() {
        return this.form.verified_at !== null
      },
      set(newValue) {
        if (newValue) {
          this.form.verified_at = moment().format('YYYY-MM-DD HH:mm:ss')
        } else {
          this.form.verified_at = null
        }
      }
    }
  }
})
</script>
