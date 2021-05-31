<template>
<div v-if = "table.length" class = "table__wrapper">
	<div class = "table__title">{{caption}}</div>
	<div class="table__wrapper">
		<div class="table__inner">
			<div class="table__row">
				<div v-for = "column in header" class="table__row-header">{{column}}</div>
			</div>
			<div v-for = "row in table" class="table__row">
				<div v-for = "cell in row" class="table__cell">{{cell}}</div>
			</div>
		</div>
	</div>
</div>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
	name: 'custom-table',
	props: {
		table: Array,
		header: Array,
		caption: String
	}
}
</script>

<style lang = "scss">
	.table {
		&__title {
			display: flex;
			justify-content: center;
			padding: 10px 0 10px 0;
		}

		&__wrapper {
			display: table;
			width: 100%;
		}

		&__inner {
			display: table-row-group;
		}

		&__row {
			display: table-row;
			height: 36px;

			&-header {
				border: 1px solid #4077d6;
				background: #4c8bf7;
				color: #fff;
				display: table-cell;
				max-width: 120px;
				height: 30px;
				word-wrap: break-word;
				vertical-align: middle;
				padding: 3px 10px;
			}
		}

		&__cell {
			font-weight: 400;
			border: 1px solid #dbdedf;
			display: table-cell;
			max-width: 120px;
			height: 30px;
			word-wrap: break-word;
			vertical-align: middle;
			padding: 3px 10px;
		}
	}
</style>