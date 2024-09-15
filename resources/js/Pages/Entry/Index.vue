<script setup lang="ts">
import type { Header, Item, ServerOptions } from 'vue3-easy-data-table';
import BreadcrumbDefault from '@/Components/Breadcrumbs/BreadcrumbDefault.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import axios from 'axios';
import { ref, watch } from 'vue';
import debounce from 'lodash/debounce';

const pageTitle = ref('Entries')

const searchField = ref('LastName');
const searchValue = ref('');

const headers: Header[] = [
  { text: 'ID', value: 'Id', sortable: true },
  { text: 'Last Name', value: 'LastName', sortable: true },
  { text: 'First Name', value: 'FirstName', sortable: true },
  { text: 'Middle Name', value: 'MiddleName', sortable: true },
  { text: 'Company Code', value: 'CompanyCode', sortable: true },
];

const items = ref<Item[]>([]);

const loading = ref(false);
const serverItemsLength = ref(0);
const serverOptions = ref<ServerOptions>({
  page: 1,
  rowsPerPage: 10,
  sortBy: 'LastName',
  sortType: 'asc',
});

const fetchData = async () => {
  loading.value = true;
  const options = serverOptions.value
  Object.assign(options, { searchField: searchField.value, searchValue: searchValue.value });
  console.log(options)
  await axios.post('/list-entries', options).then(response => {
    items.value = response.data.data;
    serverItemsLength.value = response.data.total;
    loading.value = false;
  });
};

// initial load
fetchData();

watch(serverOptions, () => { fetchData(); }, { deep: true });
watch(searchValue, debounce(async () => { fetchData() }, 800), { deep: true });
</script>

<template>
  <Head :title="pageTitle" />

  <AuthenticatedLayout>
    <!-- Breadcrumb Start -->
    <BreadcrumbDefault :pageTitle="pageTitle" />
    <!-- Breadcrumb End -->

    <!-- Main Content Start -->
    <div>
      <div class="flex mb-2">
        <span>Search field:</span>
        <div class="ml-2 max-w-sm min-w-[200px]">
          <select
            v-model="searchField"
            class="mr-2 w-full bg-slate-100 placeholder:text-slate-400 text-slate-700 text-sm border border-slate-500 rounded-md px-2 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
            <option
              v-for="(item, index) in headers"
              :key="index"
              :value="item.value">
              {{ item.text }}
            </option>
          </select>
        </div>
        <span class="ml-2">Search value: </span>
        <div class="ml-2 max-w-sm min-w-[200px]">
          <input
            v-model="searchValue"
            class="w-full bg-slate-100 placeholder:text-slate-400 text-slate-700 text-sm border border-slate-500 rounded-md px-2 py-1 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
            placeholder="Type here..." />
        </div>
      </div>

      <EasyDataTable
        v-model:server-options="serverOptions"
        :server-items-length="serverItemsLength"
        :loading="loading"
        :headers="headers"
        :items="items"
        :search-field="searchField"
        :search-value="searchValue"
        theme-color="#64748B"
        table-class-name="customize-table"
        header-text-direction="center"
        body-text-direction="center"
        border-cell >
        <template #pagination="{ prevPage, nextPage, isFirstPage, isLastPage }">
          <button
            class="bg-gray-500 text-white font-bold px-2 rounded-lg mr-2"
            :class="isFirstPage ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-700'"
            :disabled="isFirstPage"
            @click="prevPage">
            prev page
          </button>
          <button
            class="bg-gray-500 text-white font-bold px-2 rounded-lg"
            :class="isLastPage ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-700'"
            :disabled="isLastPage"
            @click="nextPage">
            next page
          </button>
        </template>
      </EasyDataTable>
    </div>
    <!-- Main Content End -->
  </AuthenticatedLayout>
</template>
