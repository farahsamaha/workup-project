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
                >{{ user.name }}
              </v-img>
              <v-card-title
                class="text-h4 my-1 font-weight-bold justify-center"
              >
              </v-card-title>
            </v-card>
            <v-avatar class="profile ml-15 my-5" color="grey" size="170">
              <v-icon dark> mdi-account-circle </v-icon>
            </v-avatar>
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
        <v-col cols="9" sm="6" md="8">
          <post-card />
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import PersonalInfo from "@/Components/User/PersonalInfo";
import UserCv from "@/Components/User/UserCv";
import PostCard from "@/Components/Home/PostCard";
import AuthenticatedLayout from "../../Layouts/AuthenticatedLayout";
export default {
  layout: AuthenticatedLayout,
  components: { PersonalInfo, UserCv, PostCard },
  props: {
    user: Object,
  },
};
</script>
