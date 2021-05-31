<template>
    <div class="control--select">
        <ul class="custom-scroll control--select--list" :class = "{ 'control--select--list-opened' : opened}">
        	<li class="control--select--list--item" 
        		:class = "{'control--select--list--item-key_selected': item == selected}"
        		v-for = "item in values"
        		@click = "setSelected(item)">{{item}}
        		</li>
        </ul>
        <button @click = "openList" class="control--select--button" tabindex="" type="button" data-value="ru">
            <span class="control--select--button-inner">{{selected}}</span>
        </button>
    </div>
</template>
<script>
export default {
	name: "custom-select",
	data(){
		return {
			selected: "Не выбрано",
			opened: false
		}
	},
	props: {
		options: {
			type: Array
		}
	},
	computed:{
		values(){
			return ["Не выбрано", ...this.$props.options]
		}
	},
	watch: {
		selected(){
			this.$emit('change',this.selected)
		}
	},
	methods: {
		setSelected(key){
			this.selected = key
			this.opened = false
		},
		openList(){
			this.opened = !this.opened
		}
	}
	
}
</script>

<style>
    .control--select--button {
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
        max-width: 100%;
        display: inline-block;
        width: 100%;
        height: 100%;
        text-align: left;
        outline: 0;
        padding-top: 1px;
        border: 1px solid #d4d5d8;
        border-bottom-width: 2px;
        border-radius: 3px;
        background: -webkit-gradient(linear,left top,left bottom,from(#fcfcfc),to(#f8f8f9));
        background: linear-gradient(to bottom,#fcfcfc 0%,#f8f8f9 100%);
        padding-right: 25px;
        padding-left: 9px;
        color: inherit;
    }

    .control--select--button:focus:after, .control--select--button:hover:after {
        -webkit-transform: rotate(45deg) scale(1.075);
        transform: rotate(45deg) scale(1.075);
    }

    .control--select--button:after {
        content: "";
        position: absolute;
        top: calc(50% - 5px);
        width: 6px;
        height: 6px;
        border-bottom: 1px solid #000;
        border-right: 1px solid #000;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        margin-left: 7px;
        right: 12px;
        z-index: 10;
    }

    .control--select--list--item-inner {
        position: relative;
        display: block;
        padding-left: 22px;
        white-space: nowrap;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        word-wrap: normal;
        z-index: 2;
    }

    .control--select, .control--select--button {
        position: relative;
        z-index: 10;
        color: #2e3640;
        height: 36px;
    }

    .control--select--list--item {
        cursor: pointer;
        position: relative;
        list-style-type: none;
        padding: 8px 6px 7px 0;
        margin: 0 -11px 0 0;
        overflow: hidden;
        box-sizing: border-box;
    }

    .control--select--list--item-key_selected {
        background: #f5f5f5;
    }

	.control--select--list--item-key_selected:before {
		content: "___";
		color: transparent;
		background: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5IiBoZWlnaHQ9IjciIHZpZXdCb3g9IjAgMCA5IDciPgogIDxwYXRoIGlkPSJmZWVkLXRhc2siIGQ9Ik0yNDkuMDEsMTQ4Ny43M2wtNS44NzgsNi4yOC0wLjEtLjExLTAuMS4xMS0yLjkzOS0zLjE0LDAuNjkzLS43NCwyLjM0OCwyLjUxLDUuMjg2LTUuNjVaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtMjQwIC0xNDg3KSIvPgo8L3N2Zz4K) 8px 6px no-repeat;
	}

    .control--select--list {
        display: none;
    }

    .control--select--list-opened {
        display: block;
        width: 100%;
        left: 0;
        border: 1px solid #d4d5d8;
        background-color: #fff;
        padding-right: 11px;
        height: auto;
        margin-right: -13px;
        border-radius: 3px;
        overflow: auto;
        position: absolute;
        max-height: 211px;
        bottom: auto;
        top: 0;
    }
</style>