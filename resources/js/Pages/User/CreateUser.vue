<template>
  <v-container>
    <v-timeline>
      <v-timeline-item>
        <v-img
          profile
          background-color="grey darken-3"
          class="ml-5 my-3 rounded-circle elevation-6"
          height="170"
          width="170"
          :src="
            user.featured_image
              ? `/storage/${user.featured_image}`
              : 'https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light'
          "
        >
        </v-img>
      </v-timeline-item>
      <v-timeline-item class="text-left">
        <form @submit.prevent="store">
        <v-card
          class="pa-2"
          outlined
          tile
          elevation="0"
        >
          <v-card-title
            class="text-h5 my-8 font-weight-bold orange--text justify-center"
            >Complete Your Information
          </v-card-title>
          <h3 class="font-weight-medium mx-10">About you</h3>
        <v-text-field
          label="add what you're working or doing now"
          outlined
          class="mx-16"
          :counter="40"
          v-model="form.about"
          required
        ></v-text-field>
         <h3 class="font-weight-medium mx-10">Birth Date</h3>
        <v-text-field
          label="1/1/1990"
          outlined
          class="mx-16"
          :counter="10"
          v-model="form.birth_date"
          required
        ></v-text-field>
         <h3 class="font-weight-medium mx-10">Mobile Number</h3>
        <v-text-field
          outlined
          class="mx-16"
          v-model="form.mobile"
          :counter="10"
          :error-messages="form.errors.mobile"
          require
        ></v-text-field>
        <h3 class="font-weight-medium mx-10">City</h3>
        <v-autocomplete
          class="mx-16"
          dense
          filled
          solo-inverted
          :items="locations"
          item-text="name"
          item-value="id"
          v-model="form.location_id"
          :error-messages="form.errors.location_id"

        >
        </v-autocomplete>

        <h3 class="font-weight-medium mx-10">Skills</h3>
        <v-autocomplete
          class="mx-16"
          multiple
          dense
          filled
          solo-inverted
          :items="skills"
          item-text="name"
          item-value="id"
          v-model="form.skill_id"
          :error-messages="form.errors.skill_id"

        >
        </v-autocomplete>

        <h3 class="font-weight-medium mx-10">Education</h3>
         <v-autocomplete
          class="mx-16"
          multiple
          dense
          filled
          solo-inverted
          :items="certificates"
          item-text="name"
          item-value="id"
          v-model="form.certificate_id"
          :error-messages="form.errors.certificate_id"

        >
        </v-autocomplete>

        <h3 class="font-weight-medium mx-10">Experiences</h3>
         <v-autocomplete
          class="mx-16"
          multiple
          dense
          filled
          solo-inverted
          :items="experiences"
          item-text="name"
          item-value="id"
          v-model="form.experience_id"
          :error-messages="form.errors.experience_id"

        >
        </v-autocomplete>

        <h3 class="font-weight-medium mx-10">Volunteering</h3>
        <v-autocomplete
          class="mx-16"
          multiple
          dense
          filled
          solo-inverted
          :items="organizations"
          item-text="name"
          item-value="id"
          v-model="form.organization_id"
          :error-messages="form.errors.organization_id"

        >
        </v-autocomplete>
         <v-btn type="submit" class="mx-16" rounded color="orange darken-3" dark>
          Add
        </v-btn>
        </v-card>
        </form>
      </v-timeline-item>
    </v-timeline>
  </v-container>
</template>

<script>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  remember: "form",

  props: {
    user: Object,
    locations: Array,
    skills: Array,
    certificates: Array,
    experiences: Array,
    organizations: Array,
  },

  data() {
    // carousel: 0;
    //  items: [
    //   'location',
    //   'skill',
    //   'experience',
    //   'certificate',
    //   'organization'
    //  ]
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

  methods: {
    store() {
      this.form.post("/users");
    },
  },
};
</script>

<style></style>
