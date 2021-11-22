<template>
  <div class="menu">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10 top-menu">
          <select
            id="top-centers-list"
            class="form-select"
            aria-label="Default select example"
          >
            <option value="21">Самотужка 2</option>
            <option value="20">Самотужка</option>
            <option value="22">Самотужка Аква</option>
          </select>
          <router-link to="/clients">Клиенты</router-link>
          <router-link to="/descriptions">Описание</router-link>
          <router-link to="/services">Услуги</router-link>
          <router-link to="/employers">Сотрудники</router-link>
          <router-link to="/salary">Зарплаты</router-link>
          <router-link to="/cashbox">Касса</router-link>
          <router-link to="/settings">Настройки</router-link>
          <router-link to="/login">ВЫХОД</router-link>
        </div>
      </div>
    </div>
</template>

<script>
export default {
  data() {
    return {};
  },
  computed: {},
  created() {},
  methods: {},
};
</script>

<style scoped>
  .router-link-active {
    background-color: gray !important;
  }
</style>