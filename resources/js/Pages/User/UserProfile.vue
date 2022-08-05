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
                ></v-img>
              </v-avatar>

              <h1 class="mt-9 ml-5 font-weight-regular">
                {{ user.name }}
              </h1></v-row
            >
          </v-col>

          <form @submit.prevent="store">
            <div class="ml-16">
              <v-btn outlined color="teal accent-4" type="submit" class="mt-10"
                ><v-icon>mdi-account-check</v-icon>change profile</v-btn
              >
              <v-btn
                elevation="0"
                class="mt-10"
                color="teal accent-4"
                dark
                small
                height="35"
                width="30"
              >
                <v-file-input
                  hide-input
                  class="ml-2 mb-4"
                  prepend-icon="mdi-camera"
                  v-model="form.featured_image"
                  accept="image/png, image/jpeg, image/bmp"
                ></v-file-input
              ></v-btn>
            </div>
          </form>
        </v-row>
      </v-card>
    </v-container>

    <v-container>
      <v-row>
        <v-col cols="3" md="4">
          <personal-info class="mt-9" />
          <user-cv class="mt-1" />
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
  data() {
    return {
      form: this.$inertia.form({
        featured_image: null,
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
