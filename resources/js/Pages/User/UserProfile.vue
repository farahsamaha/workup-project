<template>
  <div class="cover">
    <v-container>
      <v-row no-gutters>
        <v-col>
          <v-card height="330" tile>
            <v-card height="170">
              <v-img
                height="250"
                src="https://media.istockphoto.com/photos/top-view-of-dark-green-velour-fabric-picture-id928376866?k=20&m=928376866&s=612x612&w=0&h=c2pcp-FuEH7cgME0vcMfr4XC3QtcQ3WD4DXkfPcPDoU="
              >
              </v-img>
              <v-card-title
                class="text-h4 my-1 Light weight text justify-center"
              >
                {{ user.name }}
              </v-card-title>
            </v-card>

            <div>
              <form @submit.prevent="store">
                <v-img
                  profile
                  background-color="grey darken-3"
                  class="ml-5 my-3 rounded-circle elevation-6"
                  height="170"
                  width="170"
                  :src="
                    user.featured_image
                      ? `/storage/${user.featured_image}`
                      : 'https://png.pngtree.com/png-vector/20191027/ourlarge/pngtree-avatar-vector-icon-white-background-png-image_1884971.jpg'
                  "
                ></v-img>
                <v-file-input
                  class="ml-3 my-9"
                  dark
                  prepend-icon="mdi-camera"
                  v-model="user.featured_image"
                  accept="image/png, image/jpeg, image/bmp"
                ></v-file-input>
                <!-- <v-btn fab dark color="teal">
                  <file-input
                    dark
                    prepend-icon="mdi-camera"
                    type="file"
                    accept="image/png, image/jpeg, image/bmp"
                    label="Photo"
                /></v-btn> -->
              </form>
            </div>
          </v-card>
        </v-col>
      </v-row>
    </v-container>

    <v-container>
      <v-row no-gutters>
        <v-col cols="3" md="4">
          <personal-info />
          <user-cv />
        </v-col>
        <v-col cols="9" sm="6" md="8" v-for="post in user.posts" :key="post.id">
          <post-card :post="post" />
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
