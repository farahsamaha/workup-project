<template>
  <div class="cover">
    <v-container>
      <v-card class="mx-auto" max-width="700" height="1150" elevation="0">
        <v-card-title
          class="text-h4 my-8 font-weight-bold orange--text justify-center"
          >Complete your information
        </v-card-title>

        <form @submit.prevent="store" enctype="multipart/form-data">
          <h3 class="font-weight-medium mx-16">Add your photo</h3>
          <v-file-input
            name="featured_image"
            accept="image/png, image/jpeg, image/bmp"
            placeholder="Pick an avatar"
            prepend-icon="mdi-camera"
            class="mx-16"
            label="Avatar"
            v-model="form.featured_image"
          ></v-file-input>

          <h3 class="font-weight-medium mx-16">About you</h3>
          <v-text-field
            label="add what you're working or doing now"
            outlined
            class="mx-16"
            :counter="40"
            v-model="form.about"
            required
          />
          <h3 class="font-weight-medium mx-16">Birth date</h3>
          <v-menu
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            class="mx-16"
            min-width="auto"
            v-model="form.birth_date"
            require
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="form.birth_date"
                label="Picker without buttons"
                prepend-icon="mdi-calendar"
                readonly
                class="mx-16"
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="form.birth_date"
              @input="menu = false"
            ></v-date-picker>
          </v-menu>

          <h3 class="font-weight-medium mx-16">Mobile number</h3>
          <v-text-field
            outlined
            class="mx-16"
            v-model="form.mobile"
            :counter="10"
            :error-messages="form.errors.mobile"
            require
          ></v-text-field>

          <h3 class="font-weight-medium mx-16">City</h3>
          <v-select
            class="mx-16"
            outlined
            :items="locations"
            item-text="name"
            item-value="id"
            v-model="form.Location_id"
            :error-messages="form.errors.location_id"
            required
          >
          </v-select>

          <h3 class="font-weight-medium mx-16">Skills</h3>
          <v-select
            class="mx-16"
            outlined
            :items="skills"
            item-text="name"
            item-value="id"
            v-model="form.skill_id"
            :error-messages="form.errors.skill_id"
            required
          >
          </v-select>

          <h3 class="font-weight-medium mx-16">Education</h3>
          <v-select
            class="mx-16"
            outlined
            :items="certificates"
            item-text="name"
            item-value="id"
            v-model="form.certificate_id"
            :error-messages="form.errors.certificate_id"
            required
          >
          </v-select>

          <h3 class="font-weight-medium mx-16">Experience</h3>
          <v-select
            class="mx-16"
            outlined
            :items="experiences"
            item-text="name"
            item-value="id"
            v-model="form.experience_id"
            :error-messages="form.errors.experience_id"
            required
          >
          </v-select>

          <h3 class="font-weight-medium mx-16">Volunteering</h3>
          <v-select
            class="mx-16"
            outlined
            :items="organizations"
            item-text="name"
            item-value="id"
            v-model="form.organization_id"
            :error-messages="form.errors.organization_id"
            required
          >
          </v-select>

          <v-btn
            type="submit"
            class="mx-16"
            rounded
            color="orange darken-3"
            dark
          >
            Add
          </v-btn>
        </form>
      </v-card>
    </v-container>
  </div>
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
  },

  data() {
    carousel: 0;
    //  items: [
    //   'location',
    //   'skill',
    //   'experience',
    //   'certificate',
    //   'organization'
    //  ]
    return {
      form: this.$inertia.form({
        featured_image: "",
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

  methods: {
    store() {
      this.form.post("/users");
    },
    //    mounted() {
    //   console.log(this.skills);
    // },
  },
};
</script>

<style></style>
