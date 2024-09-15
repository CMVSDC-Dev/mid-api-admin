<script setup lang="ts">
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import ProfileCard from '@/Pages/Profile/Partials/ProfileCard.vue';
import { ref } from 'vue';

const pageTitle = ref('Profile')
</script>

<template>
  <Head :title="pageTitle" />

  <AuthenticatedLayout>
      <!-- Breadcrumb Start -->
      <BreadcrumbDefault :pageTitle="pageTitle" />
      <!-- Breadcrumb End -->

      <!-- Main Content Start -->
      <ProfileCard />
      <!-- Main Content End -->

  </AuthenticatedLayout>
</template>
