<template>
  <v-container>
    <v-timeline class="mx-9">
      <v-timeline-item color="teal accent-4"
        ><v-row>
          <v-container>
            <v-avatar size="170" class="ml-16">
              <v-img
                profile
                class="rounded-circle elevation-6"
                :src="
                  user.featured_image
                    ? `${user.featured_image}`
                    : 'https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg'
                "
              >
              </v-img></v-avatar
          ></v-container>
        </v-row>
        <template v-slot:opposite>
          <v-container>
            <h2 class="mr-16 teal--text font-weight-medium">
              Complete Your Information
            </h2></v-container
          >
        </template>
      </v-timeline-item>
      <form @submit.prevent="store">
        <v-timeline-item class="text-left" left color="orange darken-2">
          <v-card class="pa-2" tile elevation="1">
            <h3 class="font-weight-regular mx-10 mt-5">About you</h3>
            <v-text-field
              label="add what you're working or doing now"
              outlined
              class="mx-16"
              :counter="40"
              v-model="form.about"
              required
            ></v-text-field>
            <h3 class="font-weight-regular mx-10">Birth Date</h3>
            <v-text-field
              label="YYY-MM-DD"
              outlined
              class="mx-16"
              :counter="10"
              v-model="form.birth_date"
              required
            ></v-text-field>
            <h3 class="font-weight-regular mx-10">Mobile Number</h3>
            <v-text-field
              outlined
              class="mx-16"
              v-model="form.mobile"
              :error-messages="form.errors.mobile"
              require
            ></v-text-field>
            <h3 class="font-weight-regular mx-10">City</h3>
            <v-autocomplete
              class="mx-16"
              outlined
              :items="locations"
              item-text="name"
              item-value="id"
              v-model="form.location_id"
              :error-messages="form.errors.location_id"
            >
            </v-autocomplete>
          </v-card>
        </v-timeline-item>
        <v-timeline-item right color="teal accent-4">
          <v-card class="pa-2" tile elevation="1">
            <h3 class="font-weight-regular mx-10 mt-5">Skills</h3>

            <v-autocomplete
              class="mx-16"
              outlined
              :items="skills"
              item-text="name"
              item-value="id"
              v-model="form.skill_id"
              :error-messages="form.errors.skill_id"
              label="Select a your skills or create a new one"
              multiple
            ></v-autocomplete>

            <h3 class="font-weight-regular mx-10">Education</h3>
            <v-autocomplete
              class="mx-16"
              multiple
              outlined
              :items="certificates"
              item-text="name"
              item-value="id"
              v-model="form.certificate_id"
              :error-messages="form.errors.certificate_id"
              label="Select your certificates or create a new one"
            >
            </v-autocomplete>

            <h3 class="font-weight-regular mx-10">Experiences</h3>
            <v-autocomplete
              class="mx-16"
              multiple
              outlined
              :items="experiences"
              item-text="name"
              item-value="id"
              v-model="form.experience_id"
              :error-messages="form.errors.experience_id"
              label="Select your experiences or create a new one"
            >
            </v-autocomplete>

            <h3 class="font-weight-regular mx-10">Volunteering</h3>
            <v-autocomplete
              class="mx-16"
              multiple
              outlined
              :items="organizations"
              item-text="name"
              item-value="id"
              v-model="form.organization_id"
              :error-messages="form.errors.organization_id"
              label="Select your voluntering activites or create a new one"
            >
            </v-autocomplete>
            <v-btn
              type="submit"
              class="mx-16 mb-6"
              color="orange darken-3"
              dark
            >
              Add
            </v-btn>
          </v-card>
        </v-timeline-item>
      </form>
    </v-timeline>
  </v-container>
</template>

<script>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  remember: "form",

  props: {
    locations: Array,
    skills: Array,
    certificates: Array,
    experiences: Array,
    organizations: Array,
    user: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        // featured_image: null,
        about: "",
        birth_date: "",
        mobile: "",
        location_id: "",
        skill_id: "",
        certificate_id: "",
        experience_id: "",
        organization_id: "",
      }),
    };
  },
  //  computed: {
  //     user() {
  //       return this.$page.props.user;
  //     },
  //   },
  methods: {
    store() {
      this.form.post("/users");
    },
  },
};
</script>

<style></style>
