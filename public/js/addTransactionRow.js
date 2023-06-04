var total = 0;
const produks = [];

function updateTotal() {
    total = produks.reduce((total, produk) => {
        return total + produk.jumlah * produk.harga;
    }, 0);
    $("#transaksi-total").html(total);
}

class Produk {
    static total = (id, key) => {
        const jumlah = $(`#${key}-jumlah`).val();
        const harga = parseInt($(`#${key}-harga`).html());
        console.log(harga);
        $(`#${key}-total`).html(jumlah * harga);
        produks[id].jumlah = jumlah;
        updateTotal();
    }
    static delete = (id, key) => {
        $(`#${key}`).remove();
        delete produks[id];
        updateTotal();
    }

    constructor({id, name, harga, stok}) {
        this.id = id;
        this.key = "produk-" + id;
        this.name = name;
        this.harga = harga;
        this.stok = stok;
        this.jumlah = 1;
    }

    render() {
        return `
        <div id="${this.key}" class="flex items-center bg-slate-200 border-b-2 border-gray-100 bg-white">
            <h2 class="border-e-2 text-center border-gray-100 w-1/3">${this.name}</h2>
            <input type="hidden" name="produk[]" id="${this.key}-produk" value="${this.id}">
            <input type="number" name="jumlah[]" id="${this.key}-jumlah" value="${this.jumlah}" min="${this.stok > 0 || "0"}" max="${this.stok}" onchange="Produk.total('${this.id}','${this.key}')" placeholder="0" class="p-0 border-e-2 text-center border-gray-100 w-1/6">
            <h2 class="border-e-2 text-center border-gray-100 w-1/6">Rp.<span id="${this.key}-harga">${this.harga}</span></h2>
            <h2 class="border-e-2 text-center border-gray-100 w-1/6">Rp.<span id="${this.key}-total">${this.harga * this.jumlah}</span></h2>
            <button class="border-e-2 text-center border-gray-100 flex-grow material-icons" type="button" onClick="Produk.delete('${this.id}','${this.key}')">delete</button>
        </div>
        `;
    }
}

function addTransactionRow() {
    const produk = $('#addTransaction');
    const id = produk.val() - 1;
    if (produks[id] == null) {
        const name = produk.find(":selected").text();
        const harga = parseInt(produk.find(":selected").attr("harga"));
        const stok = parseInt(produk.find(":selected").attr("stok"));
        console.log(stok);
        produks[id] = new Produk({id, name, harga, stok});
        $("#listProduk").append(produks[id].render());
        updateTotal();
    }
    $("#addTransaction").val(0);
}
