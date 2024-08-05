<div class="js-nature-base-nature-select">
    <div class="form-group">
        <label for="name">{{ __('admin/pages/categories_form.nature_type') }}</label>
        <select name="nature_type" id="js-nature-based-category-id-select"
                class="select2 form-control" required>
        <option value="false">Select</option>
        <option value="{{App\Category::physical}}" {{ isset($category) ? ("physical" == App\Category::physical ? "selected" : '') : '' }}>Physical</option>
        <option value="{{App\Category::digital}}" {{ isset($category) ? ("digital" == App\Category::digital ? "selected" : '') : '' }}>Digital</option>
        </select>
    </div>
</div>
