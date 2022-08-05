<template>
  <div class="cover">
    <v-container>
      <v-card height="310">
        <v-img
          height="220"
          src="https://media.istockphoto.com/photos/top-view-of-dark-green-velour-fabric-picture-id928376866?k=20&m=928376866&s=612x612&w=0&h=c2pcp-FuEH7cgME0vcMfr4XC3QtcQ3WD4DXkfPcPDoU="
        >
        </v-img>
        <v-row>
          <v-col cols="8">
            <v-row>
              <v-avatar size="160" class="mb-16 ml-9">
                <v-img
                  profile
                  class="elevation-3"
                  :src="
                    user.featured_image
                      ? `${user.featured_image}`
                      : 'https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg'
                  "
                ></v-img
              ></v-avatar>

              <h1 class="mt-9 ml-5 font-weight-regular">
                {{ user.name }}
              </h1></v-row
            >
          </v-col>
        </v-row>
      </v-card>
    </v-container>

    <v-container>
      <v-row>
        <v-col cols="3" md="4">
          <!-- <personal-info class="mt-9" /> -->
          <v-card class="pa-2 mt-9" elevation="2">
            <v-row align-content="center">
              <v-col cols="8">
                <v-card-title
                  class="text-h4 mt-3 mx-2 font-weight-medium teal--text"
                >
                  About</v-card-title
                ></v-col
              >
            </v-row>

            <v-list two-line>
              <v-list-item>
                <v-list-item-icon>
                  <v-icon> mdi-clipboard-text </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>{{ user.about }}</v-list-item-title>
                  <v-list-item-subtitle>Headline*</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon> </v-icon>
                </v-list-item-icon>
                <v-list-item-content>
                  <v-list-item-title>{{ user.birth_date }}</v-list-item-title>
                  <v-list-item-subtitle>Birthday</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
              <v-divider inset></v-divider>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="teal-accent-4"> mdi-phone </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>{{ user.mobile }}</v-list-item-title>
                  <v-list-item-subtitle>Mobile</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>

              <v-divider inset></v-divider>

              <v-list-item>
                <v-list-item-icon>
                  <v-icon color="teal-accent-4"> mdi-email </v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>{{ user.email }}</v-list-item-title>
                  <v-list-item-subtitle>Email</v-list-item-subtitle>
                </v-list-item-content>
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
              </v-list-item>
            </v-list>
          </v-card>
          <!-- <user-cv class="mt-1" /> -->
          <v-card class="pa-2" elevation="2">
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
                <v-list-item v-for="skill in skills.data" :key="skill.id">
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
                <v-list-item
                  v-for="certificate in certificate.data"
                  :key="certificate.id"
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
                <v-list-item
                  v-for="experience in experience.data"
                  :key="experience.id"
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
        </v-col>
        <v-col cols="9" md="8">
          <div v-for="post in posts.data" :key="post.id">
            <post-card class="mt-6" :post="post" />
          </div>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import PersonalInfo from "@/components/user/PersonalInfo";
import UserCv from "@/components/user/UserCv";
import PostCard from "@/components/home/PostCard";
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  components: { PersonalInfo, UserCv, PostCard },
  props: {
    user: Object,
    posts: Array,
  },
  computed: {
    user() {
      return this.$page.props.user;
    },
    skills() {
      return this.$page.props.skills;
    },
    certificate() {
      return this.$page.props.certificate;
    },
    experience() {
      return this.$page.props.experience;
    },
    organization() {
      return this.$page.props.organization;
    },
  },
};
</script>
