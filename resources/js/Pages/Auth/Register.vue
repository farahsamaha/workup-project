<template>
  <authentication-card>
    <v-card-title class="text-h4 justify-center teal--text">
      Register
    </v-card-title>
    <v-form @submit.prevent="submit">
      <v-row>
        <v-col cols="12">
          <v-text-field
            v-model="form.name"
            name="name"
            label="Name"
            hide-details="auto"
            autocomplete="name"
            :error-messages="errors['name']"
            outlined
            required
            class="mx-6 my-1"
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            v-model="form.email"
            name="email"
            label="Email"
            type="email"
            hide-details="auto"
            autocomplete="email"
            :error-messages="errors['email']"
            outlined
            required
            class="mx-6 my-1"
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show1 = !show1"
            :type="show1 ? 'text' : 'password'"
            v-model="form.password"
            name="password"
            label="Password"
            hide-details="auto"
            autocomplete="new-password"
            :error-messages="errors['password']"
            outlined
            required
            class="mx-6 my-1"
          />
        </v-col>
        <v-col cols="12">
          <v-text-field
            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
            @click:append="show2 = !show2"
            v-model="form.password_confirmation"
            :type="show2 ? 'text' : 'password'"
            name="password"
            label="Confirm Password"
            hide-details="auto"
            autocomplete="new-password"
            outlined
            required
            class="mx-6 my-1"
          />
        </v-col>
        <!-- <v-col
          cols="12"
        >
          <v-checkbox
            v-model="form.terms"
            :error-messages="errors['terms']"
             class="v-btn v-btn--text v-size--small black--text"
          >
            I agree to the
             Terms of Service and
            Privacy Policy
          </v-checkbox>
        </v-col> -->
        <v-col cols="12" class="d-flex align-center">
          <v-btn
            class="mx-6 my-1 white--text"
            color="teal accent-4"
            :disabled="form.processing"
            :loading="form.processing"
            @click="submit"
          >
            Register
          </v-btn>
          <inertia-link
            :href="route('login')"
            class="v-btn v-btn--text v-size--small teal--text"
          >
            Already registered?
          </inertia-link>
        </v-col>
      </v-row>
    </v-form>
  </authentication-card>
</template>

<script>
import AuthenticationCard from "@/components/Auth/AuthenticationCard";
import AuthenticationCardLogo from "@/components/Auth/AuthenticationCardLogo";
import GuestLayout from "@/layouts/GuestLayout";

export default {
  components: {
    AuthenticationCard,
    AuthenticationCardLogo,
  },

  layout: GuestLayout,

  data() {
    return {
      show1: false,
      show2: false,
      form: this.$inertia.form({
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        terms: false,
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
      this.form.post(this.route("register"), {
        onFinish: () => this.form.reset("password", "password_confirmation"),
      });
    },
  },
};
</script>
