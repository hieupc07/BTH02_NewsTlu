<?php include('../../header.php'); ?>

<div class="container mt-5">
    <h1>Sửa Tin Tức</h1>
    <form action="/admin/news/edit/<?php echo $news['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Tiêu Đề:</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $news['title']; ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Danh Mục:</label>
            <select class="form-control" id="category" name="category" required>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['id']; ?>" <?php echo ($category['id'] == $news['category_id']) ? 'selected' : ''; ?>>
                        <?php echo $category['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Nội Dung:</label>
            <textarea class="form-control" id="content" name="content" rows="5" required><?php echo $news['content']; ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hình Ảnh:</label>
            <input type="file" class="form-control" id="image" name="image">
            <small class="form-text text-muted">Chọn hình ảnh mới nếu bạn muốn thay đổi.</small>
            <?php if ($news['image']): ?>
                <p>Hình ảnh hiện tại: <img src="/uploads/<?php echo $news['image']; ?>" alt="image" width="100"></p>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Cập Nhật Tin Tức</button>
    </form>
</div>

<?php include('../../footer.php'); ?>