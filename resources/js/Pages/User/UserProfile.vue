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
                >{{ user.name }}
              </v-card-title>
            </v-card>
            <!-- <v-avatar class="profile ml-15 my-5" color="grey" size="170">
              <v-icon dark> mdi-account-circle </v-icon>
            </v-avatar> -->
            <!-- <div>
              <v-img class="ml-15 my-5"
              rounded
              src="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
              ></v-img>
            </div> -->

            <!-- <v-list-item
              class="ml-5 my-3"
              size="0"
            > -->
            <div>
              <!-- <v-img
                src=" /storage/{{ user.featured_image }} "
                > </v-img> -->
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
              ></v-img>
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
        <v-col cols="9" sm="6" md="8">
          <post-card v-for="post in user.posts" :key="post.id" :post="post" />
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
  props: { user: Object },
};
</script>
