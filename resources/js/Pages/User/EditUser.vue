<template>
  <v-container>
    <v-timeline class="mx-9">
      <v-timeline-item color="orange darken-2">
        <v-avatar size="170" class="ml-16">
          <v-img
            profile
            class="rounded-circle elevation-6"
            :src="
              $page.props.auth.user.featured_image
                ? `/storage/${page.props.auth.user.featured_image}`
                : 'https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg'
            "
          >
          </v-img
        ></v-avatar>
        <template v-slot:opposite>
          <v-container>
            <h2 class="mr-16 teal--text font-weight-medium">
              Edit Your Information
            </h2></v-container
          >
        </template>
      </v-timeline-item>
      <v-timeline-item class="text-left" color="teal accent-4">
        <v-card class="pa-2">
          <form>
            <v-list two-line>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon> mdi-clipboard-text </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title v-model="form.about">{{
                    user.about
                  }}</v-list-item-title>
                  <v-list-item-subtitle>Headline*</v-list-item-subtitle>
                </v-list-item-content>
                <v-icon small class="mr-2" @click.prevent="updateAbout()">
                  mdi-pencil
                </v-icon>
              </v-list-item>
              <v-divider inset></v-divider>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="teal-accent-4"> mdi-phone </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title v-model="form.mobile">{{
                    user.mobile
                  }}</v-list-item-title>
                  <v-list-item-subtitle>Mobile</v-list-item-subtitle>
                </v-list-item-content>
                <v-icon small class="mr-2" @click.prevent="updateMobile()">
                  mdi-pencil
                </v-icon>
              </v-list-item>
              <v-divider inset></v-divider>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title v-model="form.location_id">{{
                    user.location_id
                  }}</v-list-item-title>
                  <v-list-item-subtitle>City</v-list-item-subtitle>
                </v-list-item-content>
                <v-icon small class="mr-2" @click.prevent="updateLocation()">
                  mdi-pencil
                </v-icon>
              </v-list-item>
            </v-list>
            <v-divider inset></v-divider>

            <v-list>
              <v-list-group
                prepend-icon="mdi-ticket"
                color="teal-accent-4"
                no-action
              >
                <template v-slot:activator>
                  <v-list-item-content>
                    <v-list-item-title>Skills</v-list-item-title>
                  </v-list-item-content>
                </template>
                <v-icon class="mx-4" small @click.prevent="deleteSkill()">
                  mdi-delete
                </v-icon>
                <v-list-item
                  v-for="skill in skills.data"
                  :key="skill.id"
                  v-model="form.skill_id"
                >
                  {{ user.skill_id }}
                  <v-list-item-content>
                    <v-list-item-title v-text="child.title"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-group>

              <v-list-group
                prepend-icon="mdi-school"
                color="teal-accent-4"
                no-action
              >
                <template v-slot:activator>
                  <v-list-item-content>
                    <v-list-item-title>Education</v-list-item-title>
                  </v-list-item-content>
                </template>
                <v-icon class="mx-4" small @click.prevent="deleteCertificate()">
                  mdi-delete
                </v-icon>
                <v-list-item
                  v-for="certificate in certificates.data"
                  :key="certificate.id"
                  v-model="form.certificate_id"
                >
                  {{ user.certificate_id }}
                  <v-list-item-content>
                    <v-list-item-title v-text="child.title"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-group>

              <v-list-group
                prepend-icon="mdi-briefcase"
                color="teal-accent-4"
                no-action
              >
                <template v-slot:activator>
                  <v-list-item-content>
                    <v-list-item-title>Experience</v-list-item-title>
                  </v-list-item-content>
                </template>
                <v-icon class="mx-4" small @click.prevent="deleteExperience()">
                  mdi-delete
                </v-icon>
                <v-list-item
                  v-for="experience in experiences.data"
                  :key="experience.id"
                  v-model="form.experience_id"
                >
                  {{ user.experience_id }}
                  <v-list-item-content>
                    <v-list-item-title v-text="child.title"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-group>

              <v-list-group
                prepend-icon="mdi-bottle-tonic-plus"
                color="teal-accent-4"
                no-action
              >
                <template v-slot:activator>
                  <v-list-item-content>
                    <v-list-item-title>Volunteering</v-list-item-title>
                  </v-list-item-content>
                </template>
                <v-icon
                  class="mx-2"
                  small
                  @click.prevent="deleteOrganization()"
                >
                  mdi-delete
                </v-icon>
                <v-list-item
                  v-for="organization in organizations.data"
                  :key="organization.id"
                  v-model="form.organization_id"
                >
                  {{ user.organization_id }}
                  <v-list-item-content>
                    <v-list-item-title v-text="child.title"></v-list-item-title>
                  </v-list-item-content>
                </v-list-item>
              </v-list-group>
            </v-list>
          </form>
        </v-card>
      </v-timeline-item>
    </v-timeline>
  </v-container>
</template>

<script>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  props: {
    locations: Array,
    skills: Array,
    certificates: Array,
    experiences: Array,
    organizations: Array,
    can: Object,
    user: Object,
  },
  data() {
    return {
      form: this.$inertia.form({
        about: this.user.about,
        mobile: this.user.mobile,
        skill_id: this.user.skill_id,
        experience_id: this.user.experience_id,
        certificate_id: this.user.certificate_id,
        organization_id: this.user.organization_id,
      }),
    };
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
  },
  methods: {
    updateAbout() {
      this.loading = true;
      this.$inertia.put(`/users/${this.user.about}`, this.form).then(() => {
        this.loading = false;
      });
    },
    updateMobile() {
      this.loading = true;
      this.$inertia.put(`/users/${this.user.mobile}`, this.form).then(() => {
        this.loading = false;
      });
    },
    updateLocation() {
      this.loading = true;
      this.$inertia.put(`/users/update`, this.form).then(() => {
        this.loading = false;
      });
    },
    deleteSkill() {
      if (confirm("Are you sure you want to delete this?")) {
        this.$inertia.delete(`/users/${this.user.skills}`);
      }
    },
    deleteCertificate() {
      if (confirm("Are you sure you want to delete this?")) {
        this.$inertia.delete(`/users/${this.user.certificates}`);
      }
    },
    deleteExperience() {
      if (confirm("Are you sure you want to delete this?")) {
        this.$inertia.delete(`/users/${this.user.experiences}`);
      }
    },
    deleteOrganization() {
      if (confirm("Are you sure you want to delete this?")) {
        this.$inertia.delete(`/users/${this.user.organizations}`);
      }
    },
  },

  deleteItemConfirm() {
    this.user.splice(this.editedIndex, 1);
    this.closeDelete();
  },

  close() {
    this.dialog = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  },

  closeDelete() {
    this.dialogDelete = false;
    this.$nextTick(() => {
      this.editedItem = Object.assign({}, this.defaultItem);
      this.editedIndex = -1;
    });
  },
};
</script>
