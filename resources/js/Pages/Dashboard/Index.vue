<script setup lang="ts">
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import DataStatsOne from '@/Components/DataStats/DataStatsOne.vue'
import ChartOne from '@/Components/Charts/ChartOne.vue'
import ChartTwo from '@/Components/Charts/ChartTwo.vue'

defineProps({
    total: {
        type: Object,
    },
});
</script>

<template>
  <Head title="Dashboard" />

  <AuthenticatedLayout>
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-4 2xl:gap-7.5">
      <DataStatsOne :total="total" />
    </div>

    <div class="mt-4 grid grid-cols-12 gap-4 md:mt-6 md:gap-6 2xl:mt-7.5 2xl:gap-7.5">
      <!-- ====== Chart One Start -->
      <ChartOne :total="total" />
      <!-- ====== Chart One End -->

      <!-- ====== Chart Two Start -->
      <ChartTwo :total="total" />
      <!-- ====== Chart Two End -->

    </div>
  </AuthenticatedLayout>
</template>
