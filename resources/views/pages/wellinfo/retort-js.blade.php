<script>
    document.addEventListener('DOMContentLoaded', () => {
        const prefixes = ['sh', 'cdu', 'cf1', 'cf2', 'cf3'];

        const parseVal = (id) => parseFloat(document.getElementById(id)?.value || 0);
        const setVal = (id, value, fixed = 2) => {
            const el = document.getElementById(id);
            if (el) el.value = isNaN(value) ? '' : parseFloat(value).toFixed(fixed);
        };

        function updateRetort(prefix) {
            try {
                const sgbasefluid = parseVal("sgbasefluid");
                const basefluid = parseVal("basefluid");
                const mudweight = parseVal("mudweight");
                const sgdrillsolid = parseVal("sgdrillsolid");
                const volholedrill = parseVal("volholedrill");

                const volcake = parseVal(`${prefix}_volcake`);

                const emptycell = parseVal(`rt_${prefix}_emptycell`);
                const emptycellwetsamp = parseVal(`rt_${prefix}_emptycellwetsamp`);
                const celldrycut = parseVal(`rt_${prefix}_celldrycut`);
                const emptycylinder = parseVal(`rt_${prefix}_emptycylinder`);
                const wtcylwaterbf = parseVal(`rt_${prefix}_wtcylwaterbf`);
                const watervolin = parseVal(`rt_${prefix}_watervolin`);
                const percofcutting = parseVal(`rt_${prefix}_percofcutting`);

                const massofdry = celldrycut - emptycell;
                const wtofwaterbf = wtcylwaterbf - emptycylinder;
                const massofcutting = emptycellwetsamp - emptycell;
                const massofbf = wtofwaterbf - watervolin;

                const basefluidvolincyl = massofbf / sgbasefluid;

                let mudoncutting = 0;
                let volmuddisc = 0;

                if (massofcutting !== 0 && sgdrillsolid !== 0 && basefluid !== 0 && sgbasefluid !== 0) {
                    const bfFraction = basefluid / 100;
                    const volbf = basefluidvolincyl / bfFraction;
                    const adjusted = (massofcutting - ((mudweight / 8.33) * volbf)) / sgdrillsolid;

                    mudoncutting = volbf / adjusted;
                }

                if (['sh', 'cdu'].includes(prefix)) {
                    volmuddisc = (volholedrill * percofcutting / 100) * mudoncutting;
                } else {
                    volmuddisc = mudoncutting * volcake / (1 + mudoncutting);
                }

                const volbfoildisc = volmuddisc * basefluid / 100;
                const ooc = (massofcutting !== 0) ? (100 * massofbf / massofcutting) : 0;

                // Set values
                setVal(`rt_${prefix}_massofdry`, massofdry, 1);
                setVal(`rt_${prefix}_wtofwaterbf`, wtofwaterbf, 1);
                setVal(`rt_${prefix}_massofcutting`, massofcutting, 1);
                setVal(`rt_${prefix}_massofbf`, massofbf, 1);
                setVal(`rt_${prefix}_basefluidvolincyl`, basefluidvolincyl, 1);
                setVal(`rt_${prefix}_mudoncutting`, mudoncutting, 2);
                setVal(`rt_${prefix}_volmuddisc`, volmuddisc, 2);
                setVal(`rt_${prefix}_volbfoildisc`, volbfoildisc, 2);
                setVal(`rt_${prefix}_ooc`, ooc, 2);
            } catch (error) {
                console.error(`Error on prefix ${prefix}:`, error);
            }
        }

        function updateRecoveredTotals() {
            const rt_sh_volmuddisc = parseFloat(document.getElementById("rt_sh_volmuddisc")?.value || 0);
            const rt_cdu_volmuddisc = parseFloat(document.getElementById("rt_cdu_volmuddisc")?.value || 0);
            const rt_cf1_volmuddisc = parseFloat(document.getElementById("rt_cf1_volmuddisc")?.value || 0);
            const rt_cf2_volmuddisc = parseFloat(document.getElementById("rt_cf2_volmuddisc")?.value || 0);
            const rt_cf3_volmuddisc = parseFloat(document.getElementById("rt_cf3_volmuddisc")?.value || 0);
            const basefluid = parseFloat(document.getElementById("basefluid")?.value || 0);

            const mud_recovered = rt_sh_volmuddisc - rt_cdu_volmuddisc - rt_cf1_volmuddisc - rt_cf2_volmuddisc - rt_cf3_volmuddisc;
            const oil_recovered = mud_recovered * basefluid / 100;

            document.getElementById("mud_recovered").value = mud_recovered.toFixed(1);
            document.getElementById("oil_recovered").value = oil_recovered.toFixed(1);
        }

        function updateFinalizeHiddenFields() {
            const volholedrill = parseVal("volholedrill");
            const basefluid = parseVal("basefluid");

            const sh_cut = parseVal("rt_sh_percofcutting");
            const cdu_cut = parseVal("rt_cdu_percofcutting");

            const cf1_mud = parseVal("rt_cf1_mudoncutting");
            const cf2_mud = parseVal("rt_cf2_mudoncutting");
            const cf3_mud = parseVal("rt_cf3_mudoncutting");

            const cf1_vol = parseVal("rt_cf1_volmuddisc");
            const cf2_vol = parseVal("rt_cf2_volmuddisc");
            const cf3_vol = parseVal("rt_cf3_volmuddisc");

            let vctodryer_bbls = volholedrill * (sh_cut / 100);
            let vctodryer_m3 = vctodryer_bbls / 6.2898;

            let vcfrdryer_bbls = (sh_cut !== 0) ? vctodryer_bbls * (cdu_cut / 100) / (sh_cut / 100) : 0;
            let vcfrdryer_m3 = vcfrdryer_bbls / 6.2898;

            let vcfrcf1_bbls = (cf1_mud !== 0) ? cf1_vol / cf1_mud : 0;
            let vcfrcf1_m3 = vcfrcf1_bbls / 6.2898;

            let vcfrcf2_bbls = (cf2_mud !== 0) ? cf2_vol / cf2_mud : 0;
            let vcfrcf2_m3 = vcfrcf2_bbls / 6.2898;

            let vcfrcf3_bbls = (cf3_mud !== 0) ? cf3_vol / cf3_mud : 0;
            let vcfrcf3_m3 = vcfrcf3_bbls / 6.2898;

            setVal("vctodryer_bbls", vctodryer_bbls, 2);
            setVal("vctodryer_m3", vctodryer_m3, 2);
            setVal("vcfrdryer_bbls", vcfrdryer_bbls, 2);
            setVal("vcfrdryer_m3", vcfrdryer_m3, 2);
            setVal("vcfrcf1_bbls", vcfrcf1_bbls, 2);
            setVal("vcfrcf1_m3", vcfrcf1_m3, 2);
            setVal("vcfrcf2_bbls", vcfrcf2_bbls, 2);
            setVal("vcfrcf2_m3", vcfrcf2_m3, 2);
            setVal("vcfrcf3_bbls", vcfrcf3_bbls, 2);
            setVal("vcfrcf3_m3", vcfrcf3_m3, 2);
        }


        // Event listener input dinamis
        prefixes.forEach(prefix => {
            const fields = [
                'emptycell', 'emptycellwetsamp', 'celldrycut',
                'emptycylinder', 'wtcylwaterbf', 'watervolin'
            ];

            fields.forEach(field => {
                const id = `rt_${prefix}_${field}`;
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener('input', () => {
                        updateRetort(prefix);
                        updateRecoveredTotals();
                        updateFinalizeHiddenFields();
                    });
                }
            });
        });

        // Trigger semua kalkulasi saat halaman pertama dimuat
        setTimeout(() => {
            prefixes.forEach(prefix => updateRetort(prefix));
            updateRecoveredTotals();
            updateFinalizeHiddenFields(); // <<< Tambahkan ini
        }, 500);

    });
</script>
