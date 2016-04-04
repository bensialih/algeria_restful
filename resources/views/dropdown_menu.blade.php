<select name="parent" class="form-control" v-model="selected" required>
        <option v-for="item in items" value="{{ item.code }}" >
            @{{ item }}
        </option>
</select>
