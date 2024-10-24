import { defineStore } from 'pinia';

export const usePaymentStore = defineStore('usePaymentStore', {
  state: () => {
    return {
      url: {
        get_by_category: "",
        update: "",
      },
      form: {
        id: -1,
        data: {
          package_id: null,
          package_name: null,
          package_price: null,
        }
      },
    }
  },
  actions: {
    setPackage(id, name, price) {
      this.form.data.package_id = id;
      this.form.data.package_name = name;
      this.form.data.package_price = price;
    },
  },
});
