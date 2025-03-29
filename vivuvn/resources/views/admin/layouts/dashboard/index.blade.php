@extends('admin.parentLayouts.master')
@section('title', 'vivuvn | Dashboard')
@section('main_content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Thu nhập Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">paid</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tổng thu nhập</p>
                        <h4 class="mb-0" id="income-value"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0" id="income-change"></p>
                </div>
            </div>
        </div>

        <!-- Chi phí Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">money_off</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tổng chi phí</p>
                        <h4 class="mb-0" id="expense-value"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0" id="expense-change"></p>
                </div>
            </div>
        </div>

        <!-- Lợi nhuận Card -->
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">account_balance</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Lợi nhuận thuần</p>
                        <h4 class="mb-0" id="profit-value"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0" id="profit-change"></p>
                </div>
            </div>
        </div>

        <!-- Tỷ suất Card -->
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">analytics</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Tỷ suất lợi nhuận</p>
                        <h4 class="mb-0" id="profit-rate-value"></h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0" id="profit-rate-change"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Thu nhập & Chi phí</h6>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="chart">
                        <canvas id="revenueChart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Tỷ suất lợi nhuận</h6>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="chart">
                        <canvas id="profitChart" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Dữ liệu mẫu theo tháng
    const monthlyData = {
        income: [6000000, 4200000, 4100000, 4400000, 4300000, 4600000, 4500000, 4800000, 4700000, 5000000, 4900000, 4719000],
        expense: [3000000, 3100000, 3200000, 3150000, 3300000, 3250000, 3400000, 3350000, 3450000, 3400000, 3300000, 3270000]
    };

    // Format tiền VND
    const formatCurrency = (amount) => {
        return new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND'
        }).format(amount);
    };

    const currentMonth = 11; // Tháng 12
    const previousMonth = 10; // Tháng 11

    // Tính toán các giá trị
    const currentIncome = monthlyData.income[currentMonth];
    const previousIncome = monthlyData.income[previousMonth];
    const incomeChange = ((currentIncome - previousIncome) / previousIncome * 100).toFixed(1);

    const currentExpense = monthlyData.expense[currentMonth];
    const previousExpense = monthlyData.expense[previousMonth];
    const expenseChange = ((currentExpense - previousExpense) / previousExpense * 100).toFixed(1);

    const currentProfit = currentIncome - currentExpense;
    const previousProfit = previousIncome - previousExpense;
    const profitChange = ((currentProfit - previousProfit) / previousProfit * 100).toFixed(1);

    const profitRate = ((currentProfit / currentIncome) * 100).toFixed(1);
    const previousProfitRate = ((previousProfit / previousIncome) * 100).toFixed(1);
    const profitRateChange = ((profitRate - previousProfitRate)).toFixed(1);

    // Cập nhật UI
    document.getElementById('income-value').textContent = formatCurrency(currentIncome);
    document.getElementById('income-change').innerHTML = `
        <i class="material-icons text-sm ${incomeChange >= 0 ? 'text-success' : 'text-danger'}">
            ${incomeChange >= 0 ? 'arrow_upward' : 'arrow_downward'}
        </i>
        <span class="${incomeChange >= 0 ? 'text-success' : 'text-danger'} text-sm font-weight-bolder">
            ${incomeChange}%
        </span> so với tháng trước
    `;

    document.getElementById('expense-value').textContent = formatCurrency(currentExpense);
    document.getElementById('expense-change').innerHTML = `
        <i class="material-icons text-sm ${expenseChange >= 0 ? 'text-danger' : 'text-success'}">
            ${expenseChange >= 0 ? 'arrow_upward' : 'arrow_downward'}
        </i>
        <span class="${expenseChange >= 0 ? 'text-danger' : 'text-success'} text-sm font-weight-bolder">
            ${expenseChange}%
        </span> so với tháng trước
    `;

    document.getElementById('profit-value').textContent = formatCurrency(currentProfit);
    document.getElementById('profit-change').innerHTML = `
        <i class="material-icons text-sm ${profitChange >= 0 ? 'text-success' : 'text-danger'}">
            ${profitChange >= 0 ? 'arrow_upward' : 'arrow_downward'}
        </i>
        <span class="${profitChange >= 0 ? 'text-success' : 'text-danger'} text-sm font-weight-bolder">
            ${profitChange}%
        </span> so với tháng trước
    `;

    document.getElementById('profit-rate-value').textContent = profitRate + '%';
    document.getElementById('profit-rate-change').innerHTML = `
        <i class="material-icons text-sm ${profitRateChange >= 0 ? 'text-success' : 'text-danger'}">
            ${profitRateChange >= 0 ? 'arrow_upward' : 'arrow_downward'}
        </i>
        <span class="${profitRateChange >= 0 ? 'text-success' : 'text-danger'} text-sm font-weight-bolder">
            ${profitRateChange}%
        </span> so với tháng trước
    `;

    // Biểu đồ thu nhập & chi phí
    new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: {
            labels: ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12'],
            datasets: [{
                label: 'Thu nhập',
                data: monthlyData.income,
                backgroundColor: '#2dce89'
            }, {
                label: 'Chi phí',
                data: monthlyData.expense,
                backgroundColor: '#f5365c'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return formatCurrency(value);
                        }
                    }
                }
            }
        }
    });

    // Biểu đồ tỷ suất lợi nhuận
    new Chart(document.getElementById('profitChart'), {
        type: 'doughnut',
        data: {
            labels: ['Đã đạt', 'Còn lại'],
            datasets: [{
                data: [profitRate, 100 - profitRate],
                backgroundColor: ['#2dce89', '#e9ecef']
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '75%'
        }
    });
});
</script>
@endpush 