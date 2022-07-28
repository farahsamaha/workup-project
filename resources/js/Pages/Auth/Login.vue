<template>
  <authentication-card>
    <div>
      <v-card-title class="text-h4 justify-center teal--text">
        {{ "Login" }}
      </v-card-title>
      <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
        {{ status }}
      </div>
      <form class="mx-3" @submit.prevent="submit">
        <v-row>
          <v-col cols="12">
            <v-text-field
              v-model="form.email"
              name="email"
              :label="'user.email'"
              type="email"
              hide-details="auto"
              :error-messages="errors['email']"
              outlined
              required
              class="mx-6 my-3"
            />
          </v-col>
          <v-col cols="12">
            <v-text-field
              v-model="form.password"
              name="password"
              type="password"
              :label="'user.password'"
              hide-details="auto"
              autocomplete="current-password"
              :error-messages="errors['password']"
              outlined
              required
              color="#000000"
              class="mx-6 my-3"
            />
          </v-col>
          <v-col cols="12">
            <v-checkbox
              v-model="form.remeber"
              label="Remember me"
              value="on"
              class="mx-7"
            />
            <!-- </v-col>
              <v-col cols="12" class=" d-flex align-center"> -->
            <v-container>
              <v-btn
                :disabled="form.processing"
                :loading="form.processing"
                type="submit"
                class="teal accent-4 white--text ml-5"
              >
                {{ "login" }}
              </v-btn>
              <inertia-link
                v-if="canResetPassword"
                :href="route('password.request')"
                class="v-btn v-btn--text v-size--small teal--text"
              >
                {{ "forgot password?" }}
              </inertia-link>
            </v-container>
          </v-col></v-row
        >
        <div class="flex px-10 py-4 bg-gray-100 border-t border-gray-100">
          <loading-button
            :loading="form.processing"
            class="btn-indigo ml-auto"
            type="submit"
          ></loading-button>
        </div>
      </form>
    </div>
  </authentication-card>
</template>

<script>
import AuthenticationCard from "@/components/Auth/AuthenticationCard";
import AuthenticationCardLogo from "@/components/Auth/AuthenticationCardLogo";
import GuestLayout from "@/Layouts/GuestLayout";
import LoadingButton from "@/components/partials/LoadingButton.vue";

export default {
  name: "LoginView",

  components: {
    AuthenticationCard,
    AuthenticationCardLogo,
    LoadingButton,
  },
  layout: GuestLayout,
  props: {
    canResetPassword: Boolean,
    status: {
      type: String,
      default: "",
    },
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  computed: {
    errors() {
      return this.$page.props.errors;
    },

    hasErrors() {
      return Object.keys(this.errors).length > 0;
    },
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
};
</script>
