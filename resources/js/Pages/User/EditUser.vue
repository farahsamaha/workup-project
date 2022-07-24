<template>
  <v-container>
    <v-card class="pa-2" outlined tile>
      <v-card-title class="text-h4 my-5 mx-2 font-weight-bold orange--text">
        Edit Information
      </v-card-title>
      <v-list two-line>
        <v-list-item>
          <v-list-item-icon>
            <!--           <v-icon> mdi-clipboard-text </v-icon> -->
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ user.About }}</v-list-item-title>
            <v-list-item-subtitle>Headline*</v-list-item-subtitle>
          </v-list-item-content>
          <v-icon small class="mr-2" @click.prevent="updateAbout(item)">
            mdi-pencil
          </v-icon>
        </v-list-item>
        <v-divider inset></v-divider>

        <v-list-item>
          <v-list-item-icon>
            <v-icon color="teal-accent-4"> mdi-phone </v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ user.Mobile }}</v-list-item-title>
            <v-list-item-subtitle>Mobile</v-list-item-subtitle>
          </v-list-item-content>
          <v-icon small class="mr-2" @click.prevent="updateMobile(item)">
            mdi-pencil
          </v-icon>
        </v-list-item>
        <v-divider inset></v-divider>

        <v-list-item>
          <v-list-item-icon>
            <v-icon color="teal-accent-4"> mdi-map-marker </v-icon>
          </v-list-item-icon>

          <v-list-item-content>
            <v-list-item-title>{{ user.location_id }}</v-list-item-title>
            <v-list-item-subtitle>City</v-list-item-subtitle>
          </v-list-item-content>
          <v-icon small class="mr-2" @click.prevent="updateLocation(item)">
            mdi-pencil
          </v-icon>
        </v-list-item>
      </v-list>
      <v-divider inset></v-divider>

      <v-list>
        <v-list-group prepend-icon="mdi-ticket" color="teal-accent-4" no-action>
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>Skills</v-list-item-title>
              <v-icon class="mx-2" small @click.prevent="deleteSkill(item)">
                mdi-delete
              </v-icon>
            </v-list-item-content>
          </template>
          <v-list-item v-for="skill in skills.data" :key="skill.id">
            {{ user.skill.name }}
            <v-list-item-content>
              <v-list-item-title v-text="child.title"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>

        <v-list-group prepend-icon="mdi-school" color="teal-accent-4" no-action>
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title>Education</v-list-item-title>
              <v-icon
                class="mx-2"
                small
                @click.prevent="deleteCertificate(item)"
              >
                mdi-delete
              </v-icon>
            </v-list-item-content>
          </template>
          <v-list-item
            v-for="certificate in certificate.data"
            :key="certificate.id"
          >
            {{ user.certificate.name }}
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
              <v-icon
                class="mx-2"
                small
                @click.prevent="deleteExperience(item)"
              >
                mdi-delete
              </v-icon>
            </v-list-item-content>
          </template>
          <v-list-item
            v-for="experience in experience.data"
            :key="experience.id"
          >
            {{ user.experience.name }}
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
              <v-icon
                class="mx-2"
                small
                @click.prevent="deleteVolunteering(item)"
              >
                mdi-delete
              </v-icon>
            </v-list-item-content>
          </template>
          <v-list-item
            v-for="organization in organization.data"
            :key="organization.id"
          >
            {{ user.organization_id }}
            <v-list-item-content>
              <v-list-item-title v-text="child.title"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
      </v-list>
    </v-card>
  </v-container>
</template>

<script>
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  props: {
    users: Object,
    skills: Array,
    certificates: Array,
    experiences: Array,
    organizations: Array,
  },
  data: () => ({
    // dialog: false,
    // dialogDelete: false,
    about: "",
    mobile: "",
    location: "",
    skill: "",
    experince: "",
    organization: "",
    certificates: "",
  }),
//   // watch: {
//   //   dialog(val) {
//   //     val || this.close();
//   //   },
//   //   dialogDelete(val) {
//   //     val || this.closeDelete();
//   //   },
//   // },
//   methods: {
//     updateAbout() {
//       this.loading = true;
//       this.$inertia.patch(`/users/${this.user.about}`, this.form).then(() => {
//         this.loading = false;
//       });
//     },
//     updateMobile() {
//       this.loading = true;
//       this.$inertia.patch(`/users/${this.user.mobile}`, this.form).then(() => {
//         this.loading = false;
//       });
//     },
//     updateLocation() {
//       this.loading = true;
//       this.$inertia
//         .patch(`/users/${this.user.location}`, this.form)
//         .then(() => {
//           this.loading = false;
//         });
//     },
//     deleteSkill() {
//       if (confirm("Are you sure you want to delete this?")) {
//         this.$inertia.delete(`/users/${this.user.skill}`);
//       }
//     },
//     deleteCertificate() {
//       if (confirm("Are you sure you want to delete this?")) {
//         this.$inertia.delete(`/users/${this.user.certificates}`);
//       }
//     },
//     deleteExperience() {
//       if (confirm("Are you sure you want to delete this?")) {
//         this.$inertia.delete(`/users/${this.user.experince}`);
//       }
//     },
//     deleteVolunteering() {
//       if (confirm("Are you sure you want to delete this?")) {
//         this.$inertia.delete(`/users/${this.user.volunteering}`);
//       }
//     },
//   },

//   deleteItemConfirm() {
//     this.jobs.splice(this.editedIndex, 1);
//     this.closeDelete();
//   },

//   close() {
//     this.dialog = false;
//     this.$nextTick(() => {
//       this.editedItem = Object.assign({}, this.defaultItem);
//       this.editedIndex = -1;
//     });
//   },
// };
}
</script>
