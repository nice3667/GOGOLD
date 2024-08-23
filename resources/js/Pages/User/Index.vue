<template>
  <div class="color-info">
    <div>
      <Toolbar />
    </div>
    <div class="flex justify-center">
      <BodyHomepage />
    </div>
    <div class="flex justify-center">
      <TableHomepage />
    </div>
    <div class="flex justify-center">
      <CommentHomepage />
    </div>
    <div class="flex justify-center">
      <MainTableHomepage />
    </div>
  </div>
</template>
<script>
import Toolbar from "@/components/Homepage/ToolbarHomepage.vue";
import BodyHomepage from "@/components/Homepage/BodyHomepage.vue";
import TableHomepage from "@/components/Homepage/TableHomepage.vue";
import CommentHomepage from "@/components/Homepage/CommentHomepage.vue";
import MainTableHomepage from "@/components/Homepage/MainTableHomepage.vue";
export default {
  name: "Homepage",
  components: {
    Toolbar,
    BodyHomepage,
    TableHomepage,
    CommentHomepage,
    MainTableHomepage,
  },
};
</script>
<style></style>
