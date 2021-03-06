<?php
	//include all DAO files
	require_once('class/sql/Connection.class.php');
	require_once('class/sql/ConnectionFactory.class.php');
	require_once('class/sql/ConnectionProperty.class.php');
	require_once('class/sql/QueryExecutor.class.php');
	require_once('class/sql/Transaction.class.php');
	require_once('class/sql/SqlQuery.class.php');
	require_once('class/core/ArrayList.class.php');
	require_once('class/dao/DAOFactory.class.php');
 	
	require_once('class/dao/ULTOADAO.class.php');
	require_once('class/dto/ULTOA.class.php');
	require_once('class/mysql/ULTOAMySqlDAO.class.php');
	require_once('class/mysql/ext/ULTOAMySqlExtDAO.class.php');
	require_once('class/dao/CajaBoletaDAO.class.php');
	require_once('class/dto/CajaBoleta.class.php');
	require_once('class/mysql/CajaBoletaMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaBoletaMySqlExtDAO.class.php');
	require_once('class/dao/CajaBonoDAO.class.php');
	require_once('class/dto/CajaBono.class.php');
	require_once('class/mysql/CajaBonoMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaBonoMySqlExtDAO.class.php');
	require_once('class/dao/CajaDetalleboletaDAO.class.php');
	require_once('class/dto/CajaDetalleboleta.class.php');
	require_once('class/mysql/CajaDetalleboletaMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaDetalleboletaMySqlExtDAO.class.php');
	require_once('class/dao/CajaDetallebonoDAO.class.php');
	require_once('class/dto/CajaDetallebono.class.php');
	require_once('class/mysql/CajaDetallebonoMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaDetallebonoMySqlExtDAO.class.php');
	require_once('class/dao/CajaEstadocomprobanteDAO.class.php');
	require_once('class/dto/CajaEstadocomprobante.class.php');
	require_once('class/mysql/CajaEstadocomprobanteMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaEstadocomprobanteMySqlExtDAO.class.php');
	require_once('class/dao/CajaPagochequesDAO.class.php');
	require_once('class/dto/CajaPagocheque.class.php');
	require_once('class/mysql/CajaPagochequesMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaPagochequesMySqlExtDAO.class.php');
	require_once('class/dao/CajaPagoefectivoDAO.class.php');
	require_once('class/dto/CajaPagoefectivo.class.php');
	require_once('class/mysql/CajaPagoefectivoMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaPagoefectivoMySqlExtDAO.class.php');
	require_once('class/dao/CajaPagotbankDAO.class.php');
	require_once('class/dto/CajaPagotbank.class.php');
	require_once('class/mysql/CajaPagotbankMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaPagotbankMySqlExtDAO.class.php');
	require_once('class/dao/CajaTipocomprobanteDAO.class.php');
	require_once('class/dto/CajaTipocomprobante.class.php');
	require_once('class/mysql/CajaTipocomprobanteMySqlDAO.class.php');
	require_once('class/mysql/ext/CajaTipocomprobanteMySqlExtDAO.class.php');
	require_once('class/dao/HmDetallehonorariossicboDAO.class.php');
	require_once('class/dto/HmDetallehonorariossicbo.class.php');
	require_once('class/mysql/HmDetallehonorariossicboMySqlDAO.class.php');
	require_once('class/mysql/ext/HmDetallehonorariossicboMySqlExtDAO.class.php');
	require_once('class/dao/HmEstadohonorarioDAO.class.php');
	require_once('class/dto/HmEstadohonorario.class.php');
	require_once('class/mysql/HmEstadohonorarioMySqlDAO.class.php');
	require_once('class/mysql/ext/HmEstadohonorarioMySqlExtDAO.class.php');
	require_once('class/dao/HmHomocodigosformulasDAO.class.php');
	require_once('class/dto/HmHomocodigosformula.class.php');
	require_once('class/mysql/HmHomocodigosformulasMySqlDAO.class.php');
	require_once('class/mysql/ext/HmHomocodigosformulasMySqlExtDAO.class.php');
	require_once('class/dao/HmHonorarioconsolidadoDAO.class.php');
	require_once('class/dto/HmHonorarioconsolidado.class.php');
	require_once('class/mysql/HmHonorarioconsolidadoMySqlDAO.class.php');
	require_once('class/mysql/ext/HmHonorarioconsolidadoMySqlExtDAO.class.php');
	require_once('class/dao/HmHonorariossicboDAO.class.php');
	require_once('class/dto/HmHonorariossicbo.class.php');
	require_once('class/mysql/HmHonorariossicboMySqlDAO.class.php');
	require_once('class/mysql/ext/HmHonorariossicboMySqlExtDAO.class.php');
	require_once('class/dao/HmPersonanaturalDAO.class.php');
	require_once('class/dto/HmPersonanatural.class.php');
	require_once('class/mysql/HmPersonanaturalMySqlDAO.class.php');
	require_once('class/mysql/ext/HmPersonanaturalMySqlExtDAO.class.php');
	require_once('class/dao/HmSociedadDAO.class.php');
	require_once('class/dto/HmSociedad.class.php');
	require_once('class/mysql/HmSociedadMySqlDAO.class.php');
	require_once('class/mysql/ext/HmSociedadMySqlExtDAO.class.php');
	require_once('class/dao/HmSociosmiembrosDAO.class.php');
	require_once('class/dto/HmSociosmiembro.class.php');
	require_once('class/mysql/HmSociosmiembrosMySqlDAO.class.php');
	require_once('class/mysql/ext/HmSociosmiembrosMySqlExtDAO.class.php');
	require_once('class/dao/MaeBancosDAO.class.php');
	require_once('class/dto/MaeBanco.class.php');
	require_once('class/mysql/MaeBancosMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeBancosMySqlExtDAO.class.php');
	require_once('class/dao/MaeCargosDAO.class.php');
	require_once('class/dto/MaeCargo.class.php');
	require_once('class/mysql/MaeCargosMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeCargosMySqlExtDAO.class.php');
	require_once('class/dao/MaeCiudadDAO.class.php');
	require_once('class/dto/MaeCiudad.class.php');
	require_once('class/mysql/MaeCiudadMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeCiudadMySqlExtDAO.class.php');
	require_once('class/dao/MaeDepartamentoDAO.class.php');
	require_once('class/dto/MaeDepartamento.class.php');
	require_once('class/mysql/MaeDepartamentoMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeDepartamentoMySqlExtDAO.class.php');
	require_once('class/dao/MaeEntidadDAO.class.php');
	require_once('class/dto/MaeEntidad.class.php');
	require_once('class/mysql/MaeEntidadMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeEntidadMySqlExtDAO.class.php');
	require_once('class/dao/MaeEspecialidadesmedicasDAO.class.php');
	require_once('class/dto/MaeEspecialidadesmedica.class.php');
	require_once('class/mysql/MaeEspecialidadesmedicasMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeEspecialidadesmedicasMySqlExtDAO.class.php');
	require_once('class/dao/MaeFinanciadorDAO.class.php');
	require_once('class/dto/MaeFinanciador.class.php');
	require_once('class/mysql/MaeFinanciadorMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeFinanciadorMySqlExtDAO.class.php');
	require_once('class/dao/MaeInsumosDAO.class.php');
	require_once('class/dto/MaeInsumo.class.php');
	require_once('class/mysql/MaeInsumosMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeInsumosMySqlExtDAO.class.php');
	require_once('class/dao/MaeInsumos2DAO.class.php');
	require_once('class/dto/MaeInsumos2.class.php');
	require_once('class/mysql/MaeInsumos2MySqlDAO.class.php');
	require_once('class/mysql/ext/MaeInsumos2MySqlExtDAO.class.php');
	require_once('class/dao/MaeMedicosDAO.class.php');
	require_once('class/dto/MaeMedico.class.php');
	require_once('class/mysql/MaeMedicosMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeMedicosMySqlExtDAO.class.php');
	require_once('class/dao/MaePacienteDAO.class.php');
	require_once('class/dto/MaePaciente.class.php');
	require_once('class/mysql/MaePacienteMySqlDAO.class.php');
	require_once('class/mysql/ext/MaePacienteMySqlExtDAO.class.php');
	require_once('class/dao/MaePersonalDAO.class.php');
	require_once('class/dto/MaePersonal.class.php');
	require_once('class/mysql/MaePersonalMySqlDAO.class.php');
	require_once('class/mysql/ext/MaePersonalMySqlExtDAO.class.php');
	require_once('class/dao/MaeRolesDAO.class.php');
	require_once('class/dto/MaeRole.class.php');
	require_once('class/mysql/MaeRolesMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeRolesMySqlExtDAO.class.php');
	require_once('class/dao/MaeSeccionesDAO.class.php');
	require_once('class/dto/MaeSeccione.class.php');
	require_once('class/mysql/MaeSeccionesMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeSeccionesMySqlExtDAO.class.php');
	require_once('class/dao/MaeServiciosDAO.class.php');
	require_once('class/dto/MaeServicio.class.php');
	require_once('class/mysql/MaeServiciosMySqlDAO.class.php');
	require_once('class/mysql/ext/MaeServiciosMySqlExtDAO.class.php');
	require_once('class/dao/OaCargoDAO.class.php');
	require_once('class/dto/OaCargo.class.php');
	require_once('class/mysql/OaCargoMySqlDAO.class.php');
	require_once('class/mysql/ext/OaCargoMySqlExtDAO.class.php');
	require_once('class/dao/OaCargoprofesionalesDAO.class.php');
	require_once('class/dto/OaCargoprofesionale.class.php');
	require_once('class/mysql/OaCargoprofesionalesMySqlDAO.class.php');
	require_once('class/mysql/ext/OaCargoprofesionalesMySqlExtDAO.class.php');
	require_once('class/dao/OaDetalleinsumosDAO.class.php');
	require_once('class/dto/OaDetalleinsumo.class.php');
	require_once('class/mysql/OaDetalleinsumosMySqlDAO.class.php');
	require_once('class/mysql/ext/OaDetalleinsumosMySqlExtDAO.class.php');
	require_once('class/dao/OaDetalleserviciosDAO.class.php');
	require_once('class/dto/OaDetalleservicio.class.php');
	require_once('class/mysql/OaDetalleserviciosMySqlDAO.class.php');
	require_once('class/mysql/ext/OaDetalleserviciosMySqlExtDAO.class.php');
	require_once('class/dao/OaEstadoscargoDAO.class.php');
	require_once('class/dto/OaEstadoscargo.class.php');
	require_once('class/mysql/OaEstadoscargoMySqlDAO.class.php');
	require_once('class/mysql/ext/OaEstadoscargoMySqlExtDAO.class.php');
	require_once('class/dao/PlandecuentasDAO.class.php');
	require_once('class/dto/Plandecuenta.class.php');
	require_once('class/mysql/PlandecuentasMySqlDAO.class.php');
	require_once('class/mysql/ext/PlandecuentasMySqlExtDAO.class.php');
	require_once('class/dao/TarConveniopaqueteDAO.class.php');
	require_once('class/dto/TarConveniopaquete.class.php');
	require_once('class/mysql/TarConveniopaqueteMySqlDAO.class.php');
	require_once('class/mysql/ext/TarConveniopaqueteMySqlExtDAO.class.php');
	require_once('class/dao/TarConveniosDAO.class.php');
	require_once('class/dto/TarConvenio.class.php');
	require_once('class/mysql/TarConveniosMySqlDAO.class.php');
	require_once('class/mysql/ext/TarConveniosMySqlExtDAO.class.php');
	require_once('class/dao/TarDetallepaqueteinsumosDAO.class.php');
	require_once('class/dto/TarDetallepaqueteinsumo.class.php');
	require_once('class/mysql/TarDetallepaqueteinsumosMySqlDAO.class.php');
	require_once('class/mysql/ext/TarDetallepaqueteinsumosMySqlExtDAO.class.php');
	require_once('class/dao/TarDetallepaqueteserviciosDAO.class.php');
	require_once('class/dto/TarDetallepaqueteservicio.class.php');
	require_once('class/mysql/TarDetallepaqueteserviciosMySqlDAO.class.php');
	require_once('class/mysql/ext/TarDetallepaqueteserviciosMySqlExtDAO.class.php');
	require_once('class/dao/TarGrupopaqueteDAO.class.php');
	require_once('class/dto/TarGrupopaquete.class.php');
	require_once('class/mysql/TarGrupopaqueteMySqlDAO.class.php');
	require_once('class/mysql/ext/TarGrupopaqueteMySqlExtDAO.class.php');
	require_once('class/dao/TarPreciosserviciosDAO.class.php');
	require_once('class/dto/TarPreciosservicio.class.php');
	require_once('class/mysql/TarPreciosserviciosMySqlDAO.class.php');
	require_once('class/mysql/ext/TarPreciosserviciosMySqlExtDAO.class.php');
	require_once('class/dao/TarSubgrupopaqueteDAO.class.php');
	require_once('class/dto/TarSubgrupopaquete.class.php');
	require_once('class/mysql/TarSubgrupopaqueteMySqlDAO.class.php');
	require_once('class/mysql/ext/TarSubgrupopaqueteMySqlExtDAO.class.php');
	require_once('class/dao/TarTipopaqueteDAO.class.php');
	require_once('class/dto/TarTipopaquete.class.php');
	require_once('class/mysql/TarTipopaqueteMySqlDAO.class.php');
	require_once('class/mysql/ext/TarTipopaqueteMySqlExtDAO.class.php');
	require_once('class/dao/ZglbMedicosDAO.class.php');
	require_once('class/dto/ZglbMedico.class.php');
	require_once('class/mysql/ZglbMedicosMySqlDAO.class.php');
	require_once('class/mysql/ext/ZglbMedicosMySqlExtDAO.class.php');
	require_once('class/dao/ZoaCargoDAO.class.php');
	require_once('class/dto/ZoaCargo.class.php');
	require_once('class/mysql/ZoaCargoMySqlDAO.class.php');
	require_once('class/mysql/ext/ZoaCargoMySqlExtDAO.class.php');
	require_once('class/dao/ZoaDetallecargoDAO.class.php');
	require_once('class/dto/ZoaDetallecargo.class.php');
	require_once('class/mysql/ZoaDetallecargoMySqlDAO.class.php');
	require_once('class/mysql/ext/ZoaDetallecargoMySqlExtDAO.class.php');
	require_once('class/dao/ZoaServiciosDAO.class.php');
	require_once('class/dto/ZoaServicio.class.php');
	require_once('class/mysql/ZoaServiciosMySqlDAO.class.php');
	require_once('class/mysql/ext/ZoaServiciosMySqlExtDAO.class.php');

?>