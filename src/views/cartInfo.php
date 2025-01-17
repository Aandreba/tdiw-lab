<ul id="cartinfo">
    <? foreach ($items as [$item, $count]): ?>
        <li>
            <span><?= $item->name ?></span>
            <span class="price"><?= $item->price / 100 ?></span>
            <input class="elem_count" type="number" min="1" value="<?= $count ?>" onchange="setCartProdCount(<?= $item->id ?>, this)" />
            <button class="remove_cart" onclick="setCartProdCount(<?= $item->id ?>, 0)">Remove</button>
        </li>
    <? endforeach ?>
</ul>

<script>
    const invisible_form = document.createElement("form");
    invisible_form.style.display = "none";
    invisible_form.method = "post";
    invisible_form.action = "/?at=cart";

    const if_action = document.createElement("input");
    if_action.type = "text";
    if_action.name = "action";
    const if_id = document.createElement("input");
    if_id.type = "number";
    if_id.name = "id";
    const if_count = document.createElement("input");
    if_count.type = "number";
    if_count.name = "count";

    invisible_form.append(if_action, if_id, if_count);
    document.body.append(invisible_form);

    function setCartProdCount(id, count_or_event) {
        console.log({
            id,
            count_or_event
        })
        if_action.value = "set";
        if_id.valueAsNumber = id;
        if_count.valueAsNumber = (count_or_event instanceof HTMLInputElement) ? count_or_event.valueAsNumber : count_or_event;
        invisible_form.submit();
    }

    for (const elem of document.querySelectorAll("#cartinfo span.price")) {
        elem.textContent = money_fmt.format(parseInt(elem.textContent));
    }
</script>
