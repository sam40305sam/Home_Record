<template>
  <q-layout view="hHh LpR fFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />

        <q-toolbar-title> Home Record </q-toolbar-title>

        <div>Quasar v{{ $q.version }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
      <q-scroll-area style="height: 100%; max-width: 100%">
        <q-list>
          <DrawerListItem
            v-for="link in linksList"
            :key="link.title"
            :content="link"
          />
        </q-list>
      </q-scroll-area>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script setup>
import { ref } from "vue";

import DrawerListItem from "components/Drawer/DrawerListItem.vue";

const linksList = ref([
  {
    title: "Dashboard",
    icon: "speed",
    link: "/",
  },
  {
    title: "Charts",
    icon: "show_chart",
    childrens: [
      {
        title: "一分",
        icon: "school",
        link: "/records/min",
      },
      {
        title: "一小時",
        icon: "school",
        link: "/records/hr",
      },
      {
        title: "一天",
        icon: "school",
        link: "/records/day",
      },
      {
        title: "一週",
        icon: "school",
        link: "/records/week",
      },
      {
        title: "一月",
        icon: "school",
        link: "/records/month",
      },
      {
        title: "半年",
        icon: "school",
        link: "/records/half_year",
      },
      {
        title: "一年",
        icon: "school",
        link: "/records/year",
      },
    ],
  },
  {
    title: "Status",
    icon: "signal_cellular_alt",
    link: "/status",
  },
]);

const leftDrawerOpen = ref(false);
const toggleLeftDrawer = () => {
  leftDrawerOpen.value = !leftDrawerOpen.value;
};
</script>

<style lang="scss" scoped>
.q-drawer {
  .q-list {
    margin: 10px 0;
  }
}
</style>
