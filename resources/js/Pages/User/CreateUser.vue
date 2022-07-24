<template>
  <div class="cover">
    <v-container>
      <v-card class="mx-auto" max-width="700" height="1000" elevation="0">
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
          ></v-file-input>
          <h3 class="font-weight-medium mx-16">About you</h3>
          <v-text-field
            label="title"
            outlined
            class="mx-16"
            v-model="form.about"
            :counter="40"
            :error-messages="form.errors.about"
            required
          />
          <h3 class="font-weight-medium mx-16">Birth date</h3>
          <!-- <v-text-field
                        label="1/1/1990"
                        outlined
                        class="mx-16"
                        v-model="form.birth_date"
                        :counter="40"
                        :error-messages="form.errors.birth_date"
                        require
                    ></v-text-field> -->
          <v-menu
            v-model="menu2"
            :close-on-content-click="false"
            :nudge-right="40"
            transition="scale-transition"
            offset-y
            class="mx-16"
            min-width="auto"
            require
          >
            <template v-slot:activator="{ on, attrs }">
              <v-text-field
                v-model="date"
                label="Picker without buttons"
                prepend-icon="mdi-calendar"
                readonly
                v-bind="attrs"
                v-on="on"
              ></v-text-field>
            </template>
            <v-date-picker
              v-model="date"
              @input="menu2 = false"
            ></v-date-picker>
          </v-menu>

          <h3 class="font-weight-medium mx-16">Mobile number</h3>
          <v-text-field
            label="0923455678"
            outlined
            class="mx-16"
            v-model="form.mobile"
            :counter="40"
            :error-messages="form.errors.mobile"
            require
          ></v-text-field>

          <h3 class="font-weight-medium mx-16">City</h3>
          <v-select
            label="Damascus"
            class="mx-16"
            outlined
            :item="locations"
            item-text="name"
            item-value="id"
            v-model="form.Location_id"
            :error-messages="form.errors.location_id"
            required
          >
            <!-- <option
                            v-for="city in cities"
                            :key="city.id"
                            :value="city.id"
                        >
                            {{ city.name }}
                        </option> -->
          </v-select>

          <h3 class="font-weight-medium mx-16">Skills</h3>
          <v-select
            label="communication"
            class="mx-16"
            outlined
            :item="skills"
            item-text="name"
            item-value="id"
            v-model="form.skill_id"
            :error-messages="form.errors.skill_id"
            required
          >
            <!-- <option
                            v-for="skill in skills"
                            :key="skill.id"
                            :value="skill.id"
                        >
                            {{ skill.name }}
                        </option> -->
          </v-select>

          <h3 class="font-weight-medium mx-16">Education</h3>
          <v-select
            label="Software Engineering"
            class="mx-16"
            outlined
            :item="certificate"
            item-text="name"
            item-value="id"
            v-model="form.certificate_id"
            :error-messages="form.errors.certificate_id"
            required
          >
            <!-- <option
                            v-for="education in education"
                            :key="education.id"
                            :value="education.id"
                        >
                            {{ education.name }}
                        </option> -->
          </v-select>

          <h3 class="font-weight-medium mx-16">Experience</h3>
          <v-select
            label="2 years of training"
            class="mx-16"
            outlined
            :item="experience"
            item-text="name"
            item-value="id"
            v-model="form.experience_id"
            :error-messages="form.errors.experience_id"
            required
          >
            <!-- <option
                            v-for="experince in experince"
                            :key="experince.id"
                            :value="experince.id"
                        >
                            {{ experince.name }}
                        </option> -->
          </v-select>

          <h3 class="font-weight-medium mx-16">Volunteering</h3>
          <v-select
            label="Full-time"
            class="mx-16"
            outlined
            :item="organization"
            item-text="name"
            item-value="id"
            v-model="form.organization_id"
            :error-messages="form.errors.organization_id"
            required
          >
            <!-- <option
                            v-for="volunteering in volunteering"
                            :key="volunteering.id"
                            :value="volunteering.id"
                        >
                            {{ volunteering.name }}
                        </option> -->
          </v-select>

          <h3 h3 class="font-weight-medium mx-16">Description</h3>
          <v-textarea
            class="mx-16"
            label="Add skills and requirements you're looking for"
            auto-grow
            outlined
            row-height="15"
            v-model="form.description"
            :error-messages="form.errors.description"
          ></v-textarea>
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
import AuthenticatedLayout from "../../layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  remember: "form",

  props: {
    users: Object,
    skills: Array,
    certificates: Array,
    experiences: Array,
    organizations: Array,
  },

  data() {
    // rules: [
    //     (value) =>
    //         !value ||
    //         value.size < 2000000 ||
    //         "Avatar size should be less than 2 MB!",
    // ];
    return {
      form: this.$inertia.form({
        about: "",
        birthdate: "",
        mobile: "",
        city_id: null,
        skill_id: null,
        education_id: null,
        experince_id: null,
        volunteering_id: null,
        description: "",
      }),
    };
  },

  methods: {
    store() {
      this.form.post("/user");
    },
  //    mounted() {
  //   console.log(this.skills);
  // },
  },
};
</script>

<style></style>
