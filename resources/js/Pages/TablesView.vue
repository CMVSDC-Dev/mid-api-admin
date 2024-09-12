<script setup lang="ts">
import { ref } from 'vue'
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue'
import TableOne from '@/Components/Tables/TableOne.vue'
import TableTwo from '@/Components/Tables/TableTwo.vue'
import TableThree from '@/Components/Tables/TableThree.vue'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'

const pageTitle = ref('Tables')
</script>

<template>
  <AuthenticatedLayout>
    <!-- Breadcrumb Start -->
    <BreadcrumbDefault :pageTitle="pageTitle" />
    <!-- Breadcrumb End -->

    <div class="flex flex-col gap-10">
      <TableOne />
      <TableTwo />
      <TableThree />
    </div>
  </AuthenticatedLayout>
</template>
